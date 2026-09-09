<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatAssistantController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $userMessage = $request->message;
        $apiKey = env('GEMINI_API_KEY');

        if (empty($apiKey)) {
            return response()->json([
                'error' => 'API Key Gemini belum diatur di server (cek file .env).'
            ], 500);
        }

        // Gunakan model gemini-3.6-flash
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-3.6-flash:generateContent?key=" . $apiKey;

        // System prompt untuk membentuk persona AI
        $systemPrompt = "Kamu adalah 'FishBot', asisten AI ahli perikanan dan budidaya ikan di platform FishNote. Tugas utamamu adalah membagikan pengalaman, tips, dan panduan budidaya ikan (lele, nila, gurame, dll) kepada peternak lokal di Indonesia. Gunakan bahasa Indonesia yang santai, bersahabat, dan mudah dimengerti. Jika ditanya hal di luar perikanan, tolak dengan sopan dan kembalikan topik ke budidaya ikan.";

        try {
            $response = Http::timeout(120)->withHeaders([
                'Content-Type' => 'application/json',
            ])->post($url, [
                'system_instruction' => [
                    'parts' => [
                        ['text' => $systemPrompt]
                    ]
                ],
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $userMessage]
                        ]
                    ]
                ],
                'generationConfig' => [
                    'temperature' => 0.7,
                    'maxOutputTokens' => 8192,
                ]
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $reply = $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Maaf, saya belum menemukan jawaban yang tepat.';
                
                return response()->json(['reply' => $reply]);
            } else {
                Log::error('Gemini API Error: ' . $response->body());
                return response()->json([
                    'error' => 'Maaf, terjadi masalah saat memproses AI. Coba lagi nanti.'
                ], 500);
            }
        } catch (\Exception $e) {
            Log::error('Gemini API Exception: ' . $e->getMessage());
            return response()->json([
                'error' => 'Terjadi kesalahan internal server saat menghubungi AI.'
            ], 500);
        }
    }
}
