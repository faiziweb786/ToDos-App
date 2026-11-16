<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## AI Chatbot

A floating AI assistant (bottom-right) on the homepage (`/`) and the logged-in home page (`/home`). Visitors click the button, a chat popup opens, and answers come from a real AI model through a backend endpoint, so the API key never reaches the browser.

### Setup

1. Get an API key from your AI provider. **Free option:** [Google AI Studio](https://aistudio.google.com/apikey) (Gemini). Paid options: [Anthropic](https://console.anthropic.com) or [OpenAI](https://platform.openai.com).
2. Add the variables below to your `.env` file (they are also listed in `.env.example`).
3. If you cache configuration (production), run `php artisan config:clear` (or `php artisan config:cache`) after editing `.env`.

No `composer install`, migration or `npm run build` is needed for the chatbot itself: it uses Laravel's built-in HTTP client, no database table and plain CSS/JS in `public/`.

| Variable | Required | Default | Description |
|---|---|---|---|
| `CHATBOT_API_KEY` | **Yes** | - | Provider secret key. Server-side only. |
| `CHATBOT_PROVIDER` | No | `anthropic` | `gemini`, `anthropic`, or `openai` (also works with OpenAI-compatible services). |
| `CHATBOT_MODEL` | No | provider default | Gemini: `gemini-3.1-flash-lite`. Anthropic: `claude-haiku-5-5`. OpenAI: `gpt-4o-mini`. Set it to use another model. |
| `CHATBOT_BASE_URL` | No | official API | For OpenAI-compatible services, e.g. `https://api.groq.com/openai/v1` or `https://openrouter.ai/api/v1`. |
| `CHATBOT_NAME` | No | `TaskMate AI` | Name shown in the chat header. |
| `CHATBOT_MAX_TOKENS` | No | `500` | Maximum length of each AI reply. |
| `CHATBOT_TIMEOUT` | No | `20` | Seconds to wait for the provider. |
| `CHATBOT_RATE_PER_MINUTE` | No | `10` | Messages per IP address per minute. |
| `CHATBOT_RATE_PER_DAY` | No | `150` | Messages per IP address per day. |

Example `.env` using the free Gemini API:

```env
CHATBOT_PROVIDER=gemini
CHATBOT_API_KEY=your-gemini-key
```

Free-tier limits and available models change; check https://ai.google.dev/gemini-api/docs/pricing and set `CHATBOT_MODEL` if the default model is unavailable for your key. Note that Google may use free-tier requests to improve its products, so avoid sending sensitive data.

### How it works

- `POST /chatbot/message` (`ChatbotController`) validates the request (max 20 messages, max 1000 characters per visitor message, valid roles), applies the `chatbot` rate limiter, and calls `ChatbotService`, which talks to the configured provider.
- The conversation is kept **only in the browser tab's memory** and is sent with each request. Nothing is stored in localStorage, sessionStorage, cookies or the database, and the server does not store or log messages. Reloading the page starts a fresh chat; closing and reopening the popup keeps the chat.
- If the provider is down, misconfigured or slow, the visitor sees a friendly message with a "Try again" button; technical details go to `storage/logs/laravel.log`.
- What the assistant knows about this app (and its tone and safety rules) lives in `config/chatbot.php` under `system_prompt`. Update it when you add features.
- Behind a proxy or load balancer (Cloudflare, Nginx), configure `App\Http\Middleware\TrustProxies` so rate limiting sees the visitor's real IP.

### Files

| File | Purpose |
|---|---|
| `config/chatbot.php` | Provider settings, limits, system prompt (reads `.env`) |
| `app/Services/ChatbotService.php` | Calls Anthropic or OpenAI-compatible APIs |
| `app/Http/Controllers/User/ChatbotController.php` | Validation and JSON responses |
| `routes/web.php` | `POST /chatbot/message` route |
| `app/Providers/RouteServiceProvider.php` | `chatbot` rate limiter |
| `resources/views/user/partial/chatbot.blade.php` | Widget markup |
| `public/css/chatbot.css`, `public/js/chatbot.js` | Widget styling and behaviour |
| `resources/views/user/layouts/app.blade.php` | `@stack('chatbot')` placeholder |
| `resources/views/user/welcome.blade.php`, `home.blade.php` | Add the widget to those pages |
| `tests/Feature/ChatbotTest.php` | Automated tests |

To show the chatbot on another user page, add this to the end of that Blade view:

```blade
@push('chatbot')
    @include('user.partial.chatbot')
@endpush
```

Run the tests with `php artisan test --filter=ChatbotTest` (no real AI calls are made).

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
