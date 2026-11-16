{{--
    AI chatbot widget (floating button + chat popup).
    Include it on any user page with:
        @push('chatbot') @include('user.partial.chatbot') @endpush
    Styles: public/css/chatbot.css   Behaviour: public/js/chatbot.js
    Backend: ChatbotController@message (config/chatbot.php)
--}}
<link rel="stylesheet" href="{{ asset('css/chatbot.css') }}">

<div id="tm-chatbot" class="tm-chatbot"
    data-endpoint="{{ route('chatbot.message') }}"
    data-max-length="{{ config('chatbot.limits.max_input_chars') }}"
    data-max-messages="{{ config('chatbot.limits.max_messages') }}"
    data-bot-name="{{ config('chatbot.name') }}"
    data-welcome="{{ __('Hi! I\'m :name, your assistant for this ToDos app. Ask me how things work, or for tips on planning and staying productive.', ['name' => config('chatbot.name')]) }}"
    data-suggestions="{{ json_encode([
        'What can I do in this app?',
        'How do I add a new item?',
        'Give me tips to stay productive',
        'How should I prioritize my tasks?',
    ]) }}">

    <section class="tm-panel" id="tm-panel" role="dialog" aria-label="{{ config('chatbot.name') }} chat" aria-hidden="true">
        <header class="tm-header">
            <div class="tm-avatar" aria-hidden="true">
                <svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor"><path d="M12 2l2.4 6.6L21 11l-6.6 2.4L12 20l-2.4-6.6L3 11l6.6-2.4z"/></svg>
            </div>
            <div class="tm-title">
                <strong>{{ config('chatbot.name') }}</strong>
                <span class="tm-status"><i class="tm-dot" aria-hidden="true"></i> Online</span>
            </div>
            <button type="button" class="tm-close" aria-label="Close chat">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 6L6 18M6 6l12 12"/></svg>
            </button>
        </header>

        <div class="tm-messages" role="log" aria-live="polite" aria-relevant="additions" tabindex="0"></div>

        <form class="tm-form" autocomplete="off" novalidate>
            <div class="tm-field">
                <textarea class="tm-input" rows="1" maxlength="{{ config('chatbot.limits.max_input_chars') }}"
                    placeholder="Type your message…" aria-label="Your message" autocomplete="off"></textarea>
                <button type="submit" class="tm-send" aria-label="Send message" disabled>
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 2L11 13"/><path d="M22 2l-7 20-4-9-9-4z"/></svg>
                </button>
            </div>
            <p class="tm-note"><span class="tm-counter" hidden></span>AI answers may be inaccurate. Press Enter to send, Shift+Enter for a new line.</p>
        </form>
    </section>

    <button type="button" class="tm-launcher" aria-label="Open AI chat assistant" aria-expanded="false" aria-controls="tm-panel">
        <svg class="tm-icon-chat" viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/><path d="M12 7l.9 2.6 2.6.9-2.6.9L12 14l-.9-2.6-2.6-.9 2.6-.9z" fill="currentColor" stroke="none"/></svg>
        <svg class="tm-icon-close" viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 6L6 18M6 6l12 12"/></svg>
    </button>
</div>

<script src="{{ asset('js/chatbot.js') }}" defer></script>
