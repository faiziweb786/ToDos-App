<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\ChatbotService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use RuntimeException;

class ChatbotController extends Controller
{
    /**
     * Answer one chatbot turn.
     *
     * The browser keeps the conversation in memory and sends it with every
     * request; nothing is stored on the server.
     */
    public function message(Request $request, ChatbotService $chatbot): JsonResponse
    {
        $limits = config('chatbot.limits');

        $data = $request->validate([
            'messages' => ['required', 'array', 'min:1', 'max:'.$limits['max_messages']],
            'messages.*.role' => ['required', 'in:user,assistant'],
            'messages.*.content' => ['required', 'string', 'max:'.$limits['max_history_chars']],
        ]);

        $messages = array_values(array_map(
            fn ($message) => ['role' => $message['role'], 'content' => $message['content']],
            $data['messages']
        ));

        $last = end($messages);

        if ($last['role'] !== 'user') {
            throw ValidationException::withMessages(['messages' => 'The last message must come from the visitor.']);
        }

        if (mb_strlen($last['content']) > $limits['max_input_chars']) {
            throw ValidationException::withMessages([
                'messages' => 'Please keep your message under '.$limits['max_input_chars'].' characters.',
            ]);
        }

        try {
            $reply = $chatbot->reply($messages);
        } catch (RuntimeException $e) {
            // Log the technical reason, show the visitor a friendly message.
            Log::error('Chatbot unavailable: '.$e->getMessage());

            return response()->json([
                'message' => 'Our AI assistant is temporarily unavailable. Please try again in a few minutes.',
            ], 503);
        }

        return response()->json(['reply' => $reply])->header('Cache-Control', 'no-store');
    }
}
