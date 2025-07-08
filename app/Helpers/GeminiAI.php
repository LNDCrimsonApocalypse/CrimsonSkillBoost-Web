<?php
namespace App\Helpers;

class GeminiAI
{
    public function generateQuizQuestions($content)
    {
        // Replace with your Gemini API endpoint and key
        $apiKey = getenv('AIzaSyBQcpZt5UaWGR4UpLvSh_kQeH21wzKeMOA');
        $endpoint = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=' . $apiKey;

        // Use a fallback prompt if content is empty
        $promptContent = trim($content) ?: 'general knowledge';

        $prompt = "Generate 5 multiple choice questions (with 4 options each, and indicate the correct answer index as \"correct_option\") based on the following content. Respond ONLY with a JSON array in the format: [{\"question\": \"...\", \"options\": [\"...\",\"...\",\"...\",\"...\"], \"correct_option\": 0}, ...]\n\n" . $promptContent;

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

        if (!$result) {
            log_message('error', '[GeminiAI] No result from Gemini API');
            return [];
        }

        $json = json_decode($result, true);
        if (!isset($json['candidates'][0]['content']['parts'][0]['text'])) {
            log_message('error', '[GeminiAI] Unexpected Gemini API response: ' . $result);
            return [];
        }

        $text = $json['candidates'][0]['content']['parts'][0]['text'];
        log_message('debug', '[GeminiAI] Gemini API raw text: ' . $text);

        $questions = json_decode($text, true);
        if (is_array($questions)) return $questions;

        // Fallback: try to parse plain text (improved)
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
            } elseif (preg_match('/^Correct answer[: ]+/i', $line)) {
                $answer = trim(substr($line, strrpos($line, ':') + 1));
                if (preg_match('/^[A-D]$/i', $answer)) {
                    $q['correct_option'] = ord(strtoupper($answer)) - ord('A');
                } elseif (is_numeric($answer)) {
                    $idx = intval($answer);
                    $q['correct_option'] = ($idx > 0 && $idx <= 4) ? $idx - 1 : max(0, $idx);
                }
            }
        }
        if (!empty($q)) $parsed[] = $q;
        $parsed = array_filter($parsed, function($item) {
            return !empty($item['question']) && count($item['options']) >= 2;
        });
        $parsed = array_values($parsed);

        if (empty($parsed)) {
            // Log the raw text for debugging
            log_message('error', '[GeminiAI] Fallback parser failed. Raw text: ' . $text);
            // Return as a single "question" for debugging on frontend
            return [['question' => $text, 'options' => [], 'correct_option' => 0]];
        }

        return $parsed;
    }
}
