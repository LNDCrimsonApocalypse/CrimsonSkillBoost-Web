<?php
namespace App\Helpers;

class GeminiAI
{
    public function generateQuizQuestions($content)
    {
        // Replace with your Gemini API endpoint and key
        $apiKey = getenv('AIzaSyBQcpZt5UaWGR4UpLvSh_kQeH21wzKeMOA');
        $endpoint = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=' . $apiKey;

        $prompt = "Generate 5 multiple choice questions (with 4 options each, and indicate the correct answer index) based on the following content:\n\n" . $content;

        $body = [
            "contents" => [
                [
                    "parts" => [
                        ["text" => $prompt]
                    ]
                ]
            ]
        ];

        $ch = curl_init($endpoint);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);
        $result = curl_exec($ch);
        curl_close($ch);

        if (!$result) return [];

        $json = json_decode($result, true);
        if (!isset($json['candidates'][0]['content']['parts'][0]['text'])) return [];

        // Expecting a JSON array of questions in the response text
        $text = $json['candidates'][0]['content']['parts'][0]['text'];
        // Try to decode as JSON, fallback to parsing if needed
        $questions = json_decode($text, true);
        if (is_array($questions)) return $questions;

        // Fallback: try to parse plain text (very basic)
        $lines = explode("\n", $text);
        $parsed = [];
        $q = [];
        foreach ($lines as $line) {
            $line = trim($line);
            if (preg_match('/^\d+\./', $line)) {
                if (!empty($q)) $parsed[] = $q;
                $q = ['question' => preg_replace('/^\d+\.\s*/', '', $line), 'options' => [], 'correct_option' => 0];
            } elseif (preg_match('/^[A-D]\)/', $line)) {
                $q['options'][] = preg_replace('/^[A-D]\)\s*/', '', $line);
            } elseif (stripos($line, 'Correct answer:') !== false) {
                // Accept both 0-based and 1-based index, fallback to 0
                $idx = intval(trim(substr($line, strrpos($line, ':') + 1)));
                $q['correct_option'] = max(0, $idx - 1);
            }
        }
        if (!empty($q)) $parsed[] = $q;
        return $parsed;
    }
}
