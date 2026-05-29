<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $messages = array_slice($request->input('messages', []), -6);
        $system   = $request->input('system', '');

        // Convertir historial de formato Anthropic a formato Gemini
        $geminiMessages = [];

        // Agregar el system prompt como primer mensaje del usuario
        if (!empty($system)) {
            $geminiMessages[] = [
                'role'  => 'user',
                'parts' => [['text' => $system]]
            ];
            $geminiMessages[] = [
                'role'  => 'model',
                'parts' => [['text' => 'Entendido. Soy el asistente de TransportesPro y seguiré todas esas instrucciones.']]
            ];
        }

        // Agregar el historial de la conversación
        foreach ($messages as $msg) {
            $geminiMessages[] = [
                'role'  => $msg['role'] === 'assistant' ? 'model' : 'user',
                'parts' => [['text' => $msg['content']]]
            ];
        }

        $apiKey = config('services.gemini.key');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->timeout(30)->post(
            "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key={$apiKey}",
            [
                'contents' => $geminiMessages,
                'generationConfig' => [
                    'maxOutputTokens' => 500,
                    'temperature'     => 0.7,
                ]
            ]
        );

        if ($response->failed()) {
            return response()->json([
                'error'  => 'Error al contactar con la IA',
                'detail' => $response->json()
            ], 500);
        }

        $data = $response->json();

        // Extraer el texto de la respuesta de Gemini
        $text = $data['candidates'][0]['content']['parts'][0]['text']
            ?? 'Lo siento, no pude procesar tu consulta. Intenta de nuevo.';

        // Devolver en el mismo formato que espera el widget del frontend
        return response()->json([
            'content' => [
                ['type' => 'text', 'text' => $text]
            ]
        ]);
    }
}