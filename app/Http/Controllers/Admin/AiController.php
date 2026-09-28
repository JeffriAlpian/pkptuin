<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AiController extends Controller
{
    public function generateNews(Request $request)
    {
        $request->validate([
            'what' => 'required|string',
            'who' => 'required|string',
            'when' => 'required|string',
            'where' => 'required|string',
            'why' => 'required|string',
            'how' => 'required|string',
        ]);

        $apiKey = env('GEMINI_API_KEY');
        
        if (!$apiKey) {
            return response()->json(['error' => 'GEMINI_API_KEY belum diatur di file .env'], 500);
        }

        $prompt = "buatkan artikel berita jurnalistik formal berbahasa Indonesia yang menarik dan siap dipublikasikan. 
Format output menggunakan tag HTML dasar seperti <p>, <h3>, <ul>, <li>, <strong>. 
Jangan gunakan tag <html>, <head>, atau <body>, cukup isinya saja karena akan dimasukkan ke WYSIWYG editor. 
Jangan gunakan format markdown, langsung gunakan HTML.

Gunakan data 5W1H berikut sebagai bahan berita:
- What (Apa yang terjadi): " . $request->what . "
- Who (Siapa yang terlibat/hadir): " . $request->who . "
- When (Kapan acara/kejadian): " . $request->when . "
- Where (Di mana lokasi): " . $request->where . "
- Why (Mengapa diadakan/penting): " . $request->why . "
- How (Bagaimana proses/detail jalannya acara): " . $request->how;

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post("https://generativelanguage.googleapis.com/v1/models/gemini-2.5-flash-lite:generateContent?key=" . $apiKey, [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt]
                        ]
                    ]
                ],
                'generationConfig' => [
                    'temperature' => 0.7,
                ]
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $generatedText = $data['candidates'][0]['content']['parts'][0]['text'] ?? '';
                
                // Hapus block markdown HTML jika Gemini menambahkannya (misal: ```html ... ```)
                $generatedText = preg_replace('/```html\s*|\s*```/', '', $generatedText);

                return response()->json(['content' => trim($generatedText)]);
            }

            return response()->json(['error' => 'Gagal menghubungi server AI. Respons: ' . $response->body()], 500);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan sistem: ' . $e->getMessage()], 500);
        }
    }
}
