/**
 * AI chatbot widget.
 *
 * The conversation lives only in this closure (plain JS variables). It is never written to
 * localStorage, sessionStorage, cookies or the database, so a page reload starts a fresh chat.
 * Closing and re-opening the popup keeps the conversation because the page itself is still alive.
 */
(function () {
    'use strict';

    var root = document.getElementById('tm-chatbot');
    if (!root) { return; }

    var el = {
        launcher: root.querySelector('.tm-launcher'),
        panel: root.querySelector('.tm-panel'),
        close: root.querySelector('.tm-close'),
        messages: root.querySelector('.tm-messages'),
        form: root.querySelector('.tm-form'),
        input: root.querySelector('.tm-input'),
        send: root.querySelector('.tm-send'),
        counter: root.querySelector('.tm-counter')
    };

    var cfg = {
        endpoint: root.getAttribute('data-endpoint'),
        maxLength: parseInt(root.getAttribute('data-max-length'), 10) || 1000,
        maxMessages: parseInt(root.getAttribute('data-max-messages'), 10) || 20,
        botName: root.getAttribute('data-bot-name') || 'AI assistant',
        welcome: root.getAttribute('data-welcome') || 'Hi! How can I help you today?',
        suggestions: parseJson(root.getAttribute('data-suggestions'), []),
        timeoutMs: 60000
    };

    var csrfMeta = document.querySelector('meta[name="csrf-token"]');
    var csrfToken = csrfMeta ? csrfMeta.getAttribute('content') : '';
    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    var BOT_ICON = '<svg viewBox="0 0 24 24" width="15" height="15" fill="currentColor" aria-hidden="true"><path d="M12 2l2.4 6.6L21 11l-6.6 2.4L12 20l-2.4-6.6L3 11l6.6-2.4z"/></svg>';

    // ---- State (in memory only) ----
    var history = [];        // [{role: 'user'|'assistant', content: string}] sent to the backend
    var isOpen = false;
    var welcomed = false;
    var pending = false;
    var session = 0;         // bumped on reset so late responses from an old chat are ignored
    var typingEl = null;

    // ---- Helpers ----
    function parseJson(value, fallback) {
        try { return JSON.parse(value) || fallback; } catch (e) { return fallback; }
    }

    function escapeHtml(text) {
        return text.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;').replace(/'/g, '&#39;');
    }

    function inline(text) {
        return escapeHtml(text)
            .replace(/`([^`\n]+)`/g, '<code>$1</code>')
            .replace(/\*\*([^*\n]+)\*\*/g, '<strong>$1</strong>');
    }

    // Tiny, safe formatter for AI replies: paragraphs, bullet/numbered lists, **bold**, `code`.
    // All text is HTML-escaped first, so model output can never inject markup.
    function renderRich(text) {
        var out = [], para = [], list = null;

        function flushPara() {
            if (para.length) { out.push('<p>' + para.join('<br>') + '</p>'); para = []; }
        }
        function flushList() {
            if (list) { out.push('<' + list.tag + '>' + list.items.join('') + '</' + list.tag + '>'); list = null; }
        }

        text.replace(/\r\n?/g, '\n').split('\n').forEach(function (line) {
            var ul = line.match(/^\s*[-*\u2022]\s+(.*)$/);
            var ol = line.match(/^\s*\d+[.)]\s+(.*)$/);
            var heading = line.match(/^\s*#{1,6}\s+(.*)$/);

            if (ul || ol) {
                var tag = ul ? 'ul' : 'ol';
                flushPara();
                if (list && list.tag !== tag) { flushList(); }
                if (!list) { list = { tag: tag, items: [] }; }
                list.items.push('<li>' + inline((ul || ol)[1]) + '</li>');
            } else if (!line.trim()) {
                flushPara(); flushList();
            } else {
                flushList();
                para.push(heading ? '<strong>' + inline(heading[1]) + '</strong>' : inline(line));
            }
        });

        flushPara(); flushList();
        return out.join('');
    }

    function scrollToBottom() {
        window.requestAnimationFrame(function () {
            if (typeof el.messages.scrollTo === 'function') {
                el.messages.scrollTo({ top: el.messages.scrollHeight, behavior: reduceMotion ? 'auto' : 'smooth' });
            } else {
                el.messages.scrollTop = el.messages.scrollHeight;
            }
        });
    }

    function hasFinePointer() {
        return window.matchMedia && window.matchMedia('(pointer: fine)').matches;
    }

    // ---- Rendering ----
    function addMessage(role, text) {
        var row = document.createElement('div');
        row.className = 'tm-msg ' + (role === 'user' ? 'tm-user' : 'tm-bot');

        if (role !== 'user') {
            var avatar = document.createElement('div');
            avatar.className = 'tm-mini-avatar';
            avatar.setAttribute('aria-hidden', 'true');
            avatar.innerHTML = BOT_ICON;
            row.appendChild(avatar);
        }

        var bubble = document.createElement('div');
        bubble.className = 'tm-bubble';
        if (role === 'user') {
            bubble.textContent = text; // plain text; CSS keeps line breaks
        } else {
            bubble.innerHTML = renderRich(text);
        }
        row.appendChild(bubble);

        el.messages.appendChild(row);
        scrollToBottom();
        return row;
    }

    function addError(message, retryText) {
        var row = document.createElement('div');
        row.className = 'tm-msg tm-bot tm-error';

        var avatar = document.createElement('div');
        avatar.className = 'tm-mini-avatar';
        avatar.setAttribute('aria-hidden', 'true');
        avatar.innerHTML = BOT_ICON;
        row.appendChild(avatar);

        var bubble = document.createElement('div');
        bubble.className = 'tm-bubble';
        bubble.setAttribute('role', 'alert');
        var text = document.createElement('div');
        text.textContent = message;
        bubble.appendChild(text);

        if (retryText) {
            var retry = document.createElement('button');
            retry.type = 'button';
            retry.className = 'tm-retry';
            retry.textContent = 'Try again';
            retry.addEventListener('click', function () {
                if (pending) { return; }
                row.parentNode && row.parentNode.removeChild(row);
                sendMessage(retryText, true);
            });
            bubble.appendChild(retry);
        }

        row.appendChild(bubble);
        el.messages.appendChild(row);
        scrollToBottom();
    }

    function removeErrors() {
        var errors = el.messages.querySelectorAll('.tm-error');
        for (var i = 0; i < errors.length; i++) { errors[i].parentNode.removeChild(errors[i]); }
    }

    function showTyping() {
        hideTyping();
        typingEl = document.createElement('div');
        typingEl.className = 'tm-msg tm-bot tm-typing';
        typingEl.setAttribute('role', 'status');
        typingEl.setAttribute('aria-label', cfg.botName + ' is typing');
        typingEl.innerHTML = '<div class="tm-mini-avatar" aria-hidden="true">' + BOT_ICON + '</div>' +
            '<div class="tm-bubble"><i></i><i></i><i></i></div>';
        el.messages.appendChild(typingEl);
        scrollToBottom();
    }

    function hideTyping() {
        if (typingEl && typingEl.parentNode) { typingEl.parentNode.removeChild(typingEl); }
        typingEl = null;
    }

    function showWelcome() {
        welcomed = true;
        addMessage('bot', cfg.welcome);

        if (cfg.suggestions.length) {
            var box = document.createElement('div');
            box.className = 'tm-suggestions';
            cfg.suggestions.forEach(function (question) {
                var chip = document.createElement('button');
                chip.type = 'button';
                chip.className = 'tm-chip';
                chip.textContent = question;
                chip.addEventListener('click', function () { sendMessage(question); });
                box.appendChild(chip);
            });
            el.messages.appendChild(box);
            scrollToBottom();
        }
    }

    function removeSuggestions() {
        var box = el.messages.querySelector('.tm-suggestions');
        if (box) { box.parentNode.removeChild(box); }
    }

    // ---- Composer state ----
    function updateComposer() {
        var length = el.input.value.length;
        el.send.disabled = pending || el.input.value.trim().length === 0;

        // Grow with content, up to the CSS max-height
        el.input.style.height = 'auto';
        el.input.style.height = Math.min(el.input.scrollHeight, 120) + 'px';

        // Character counter only appears when the limit is getting close
        if (length >= cfg.maxLength * 0.8) {
            el.counter.hidden = false;
            el.counter.textContent = length + ' / ' + cfg.maxLength;
            el.counter.classList.toggle('tm-limit', length >= cfg.maxLength);
        } else {
            el.counter.hidden = true;
        }
    }

    function setPending(value) {
        pending = value;
        var chips = el.messages.querySelectorAll('.tm-chip, .tm-retry');
        for (var i = 0; i < chips.length; i++) { chips[i].disabled = value; }
        el.messages.setAttribute('aria-busy', value ? 'true' : 'false');
        updateComposer();
    }

    // ---- Keep the widget on screen even if the host page overflows horizontally ----
    // When a page is wider than the screen, mobile browsers enlarge the layout viewport and
    // position:fixed elements land off-screen. Measure the visible area and pin the widget to it.
    function fitToVisibleArea() {
        var vv = window.visualViewport;
        var style = root.style;

        if (!vv) { return; }
        if (Math.abs(vv.scale - 1) > 0.01) { return; } // pinch-zoomed: leave as is

        // Fixed elements are laid out against the layout viewport (window.innerWidth/innerHeight)
        var right = window.innerWidth - vv.offsetLeft - vv.width;
        var bottom = window.innerHeight - vv.offsetTop - vv.height;

        // Differences of a few pixels are just scrollbars, not an enlarged layout viewport
        if (window.innerWidth - vv.width > 24 || right > 24) {
            style.setProperty('--tm-inset-right', Math.max(0, right) + 'px');
            style.setProperty('--tm-vw', vv.width + 'px');
        } else {
            style.removeProperty('--tm-inset-right');
            style.removeProperty('--tm-vw');
        }

        if (window.innerHeight - vv.height > 24 || bottom > 24) {
            style.setProperty('--tm-inset-bottom', Math.max(0, bottom) + 'px');
            style.setProperty('--tm-vh', vv.height + 'px');
        } else {
            style.removeProperty('--tm-inset-bottom');
            style.removeProperty('--tm-vh');
        }
    }

    // ---- Open / close ----
    function setOpen(open) {
        isOpen = open;
        root.classList.toggle('tm-open', open);
        el.panel.setAttribute('aria-hidden', open ? 'false' : 'true');
        el.launcher.setAttribute('aria-expanded', open ? 'true' : 'false');
        el.launcher.setAttribute('aria-label', open ? 'Close AI chat assistant' : 'Open AI chat assistant');

        if (open) {
            if (!welcomed) { showWelcome(); }
            scrollToBottom();
            if (hasFinePointer()) { window.setTimeout(function () { el.input.focus(); }, 80); }
        }
    }

    // ---- Networking ----
    function friendlyError(status, data, headers) {
        if (status === 419) {
            return { text: 'Your session has expired. Please refresh the page to start a new chat.', retry: false };
        }
        if (status === 422) {
            var detail = data && data.errors && data.errors.messages && data.errors.messages[0];
            return { text: detail || (data && data.message) || 'That message could not be sent. Please try a shorter one.', retry: false };
        }
        if (status === 429) {
            var wait = parseInt(headers.get('Retry-After'), 10);
            return {
                text: 'You are sending messages too quickly. ' + (wait ? 'Please wait ' + wait + ' seconds and try again.' : 'Please wait a moment and try again.'),
                retry: true
            };
        }
        return {
            text: (data && data.message) || 'Our AI assistant is temporarily unavailable. Please try again in a few minutes.',
            retry: true
        };
    }

    function sendMessage(text, isRetry) {
        text = (text || '').trim();
        if (pending || !text || text.length > cfg.maxLength) { return; }

        removeSuggestions();
        removeErrors();
        if (!isRetry) { addMessage('user', text); }

        var mySession = session;
        var historyLength = history.push({ role: 'user', content: text });

        // Never send more than the backend accepts, and always start from a user turn
        var payload = history.slice(-cfg.maxMessages);
        while (payload.length && payload[0].role !== 'user') { payload.shift(); }

        setPending(true);
        showTyping();

        var controller = typeof AbortController === 'function' ? new AbortController() : null;
        var timer = controller ? window.setTimeout(function () { controller.abort(); }, cfg.timeoutMs) : null;

        fetch(cfg.endpoint, {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({ messages: payload }),
            signal: controller ? controller.signal : undefined
        })
            .then(function (response) {
                return response.json().catch(function () { return {}; }).then(function (data) {
                    return { response: response, data: data };
                });
            })
            .then(function (result) {
                if (mySession !== session) { return; } // chat was reset while waiting

                if (!result.response.ok || !result.data || typeof result.data.reply !== 'string') {
                    var info = friendlyError(result.response.status, result.data, result.response.headers);
                    history.length = historyLength - 1; // drop the unanswered turn
                    hideTyping();
                    addError(info.text, info.retry ? text : null);
                    return;
                }

                history.push({ role: 'assistant', content: result.data.reply });
                hideTyping();
                addMessage('bot', result.data.reply);
            })
            .catch(function () {
                if (mySession !== session) { return; }
                history.length = historyLength - 1;
                hideTyping();
                addError('I could not reach the assistant. Please check your connection and try again.', text);
            })
            .then(function () {
                if (timer) { window.clearTimeout(timer); }
                if (mySession !== session) { return; }
                setPending(false);
                if (isOpen && hasFinePointer()) { el.input.focus(); }
            });
    }

    // ---- Reset (used when the browser restores this page from its back/forward cache) ----
    function reset() {
        session++;
        history = [];
        welcomed = false;
        pending = false;
        typingEl = null;
        el.messages.innerHTML = '';
        el.input.value = '';
        setPending(false);
        setOpen(false);
    }

    // ---- Events ----
    el.launcher.addEventListener('click', function () { setOpen(!isOpen); });

    el.close.addEventListener('click', function () {
        setOpen(false);
        el.launcher.focus();
    });

    root.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && isOpen) {
            setOpen(false);
            el.launcher.focus();
        }
    });

    el.input.addEventListener('input', updateComposer);

    el.input.addEventListener('keydown', function (event) {
        // Enter sends, Shift+Enter inserts a new line (ignore Enter used to confirm IME text)
        if (event.key === 'Enter' && !event.shiftKey && !event.isComposing) {
            event.preventDefault();
            el.form.requestSubmit ? el.form.requestSubmit() : el.send.click();
        }
    });

    el.form.addEventListener('submit', function (event) {
        event.preventDefault();
        if (pending || !el.input.value.trim()) { return; }

        var text = el.input.value;
        el.input.value = '';
        updateComposer();
        sendMessage(text);
    });

    if (window.visualViewport) {
        window.visualViewport.addEventListener('resize', fitToVisibleArea);
        window.visualViewport.addEventListener('scroll', fitToVisibleArea);
    }
    window.addEventListener('resize', fitToVisibleArea);
    window.addEventListener('orientationchange', fitToVisibleArea);
    window.addEventListener('load', fitToVisibleArea);

    window.addEventListener('pageshow', function (event) {
        // Restored from bfcache (Back/Forward): a "fresh page" must mean a fresh chat
        if (event.persisted) { reset(); }
    });

    updateComposer();
    fitToVisibleArea();
})();
