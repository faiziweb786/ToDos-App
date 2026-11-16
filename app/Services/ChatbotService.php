<?php

namespace App\Services;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use RuntimeException;

/**
 * Talks to the configured AI provider on behalf of the website chatbot.
 *
 * Stateless by design: the conversation is supplied by the caller on every
 * request and nothing is stored or logged here.
 */
class ChatbotService
{
    private const FALLBACK_REPLY = "I'm sorry, I couldn't come up with an answer to that. Could you try rephrasing your question?";

    /**
     * @param  array<int, array{role: string, content: string}>  $messages  Conversation so far, ending with the visitor's message.
     *
     * @throws RuntimeException When the provider is misconfigured or unavailable.
     */
    public function reply(array $messages): string
    {
        $apiKey = config('chatbot.api_key');

        if (blank($apiKey)) {
            throw new RuntimeException('CHATBOT_API_KEY is not configured.');
        }

        $messages = $this->normalize($messages);
        $provider = config('chatbot.provider');

        $text = match ($provider) {
            'anthropic' => $this->askAnthropic($apiKey, $messages),
            'openai' => $this->askOpenAi($apiKey, $messages, 'https://api.openai.com/v1', 'gpt-4o-mini'),
            // Google Gemini through its OpenAI-compatible endpoint (has a free tier).
            // Gemini models "think" before answering and that uses output tokens, so leave extra room.
            'gemini' => $this->askOpenAi(
                $apiKey,
                $messages,
                'https://generativelanguage.googleapis.com/v1beta/openai',
                'gemini-3.1-flash-lite',
                max(config('chatbot.max_tokens'), 1024)
            ),
            default => throw new RuntimeException("Unsupported chatbot provider [{$provider}]."),
        };

        $text = trim($text);

        return $text !== '' ? $text : self::FALLBACK_REPLY;
    }

    private function askAnthropic(string $apiKey, array $messages): string
    {
        $base = rtrim(config('chatbot.base_url') ?: 'https://api.anthropic.com', '/');

        $json = $this->post('anthropic', $base.'/v1/messages', [
            'x-api-key' => $apiKey,
            'anthropic-version' => '2023-06-01',
        ], [
            'model' => config('chatbot.model') ?: 'claude-haiku-5-5',
            'max_tokens' => config('chatbot.max_tokens'),
            'system' => config('chatbot.system_prompt'),
            'messages' => $messages,
        ]);

        return collect($json['content'] ?? [])
            ->where('type', 'text')
            ->pluck('text')
            ->implode("\n");
    }

    private function askOpenAi(string $apiKey, array $messages, string $defaultBase, string $defaultModel, ?int $maxTokens = null): string
    {
        $base = rtrim(config('chatbot.base_url') ?: $defaultBase, '/');

        $json = $this->post('openai', $base.'/chat/completions', [
            'Authorization' => 'Bearer '.$apiKey,
        ], [
            'model' => config('chatbot.model') ?: $defaultModel,
            'max_tokens' => $maxTokens ?? config('chatbot.max_tokens'),
            'messages' => array_merge(
                [['role' => 'system', 'content' => config('chatbot.system_prompt')]],
                $messages
            ),
        ]);

        return (string) data_get($json, 'choices.0.message.content', '');
    }

    private function post(string $provider, string $url, array $headers, array $payload): array
    {
        try {
            $response = $this->client($headers)->post($url, $payload);
        } catch (ConnectionException $e) {
            throw new RuntimeException("Chatbot provider [{$provider}] is unreachable: ".$e->getMessage(), 0, $e);
        }

        if ($response->failed()) {
            Log::warning('Chatbot provider returned an error.', [
                'provider' => $provider,
                'status' => $response->status(),
                'error' => Str::limit((string) data_get($response->json(), 'error.message', ''), 200),
            ]);

            throw new RuntimeException("Chatbot provider [{$provider}] returned HTTP {$response->status()}.");
        }

        return $response->json() ?? [];
    }

    private function client(array $headers): PendingRequest
    {
        return Http::withHeaders($headers)
            ->acceptJson()
            ->connectTimeout(10)
            ->timeout(config('chatbot.timeout'))
            // One retry for transient problems only (network errors and 5xx).
            ->retry(2, 300, function ($exception) {
                return $exception instanceof ConnectionException
                    || ($exception instanceof RequestException && $exception->response->serverError());
            }, throw: false);
    }

    /**
     * Providers require the conversation to start with a user turn and to
     * alternate roles, so tidy up whatever the browser sent.
     */
    private function normalize(array $messages): array
    {
        $clean = [];

        foreach ($messages as $message) {
            $content = trim(preg_replace('/[^\P{C}\n\t]+/u', '', $message['content']) ?? $message['content']);

            if ($content === '' || ($clean === [] && $message['role'] !== 'user')) {
                continue;
            }

            $last = count($clean) - 1;

            if ($last >= 0 && $clean[$last]['role'] === $message['role']) {
                $clean[$last]['content'] .= "\n\n".$content;
                continue;
            }

            $clean[] = ['role' => $message['role'], 'content' => $content];
        }

        return $clean;
    }
}
