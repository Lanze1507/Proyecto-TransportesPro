<?php

namespace App\Http\Controllers;

use Gemini\Laravel\Facades\Gemini;
use Illuminate\Http\Request;

class GeminiController extends Controller
{
    public function preguntar(Request $request)
    {
        $prompt = $request->input('prompt', 'Hola, ¿cómo estás?');

        try {
            $resultado = Gemini::generativeModel(model: 'gemini-2.5-flash')
                ->generateContent($prompt);

            return response()->json([
                'respuesta' => $resultado->text()
            ]); 

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}