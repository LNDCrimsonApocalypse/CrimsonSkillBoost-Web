<?php
namespace App\Helpers;

use CodeIgniter\Cache\CacheInterface;
use Exception;

class GeminiAI {
    private $apiKey;
    private $apiEndpoint = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent';
    private $cache;
    private $rateLimitPerMin = 60;

    public function __construct() {
        $this->apiKey = getenv('GEMINI_API_KEY');
        $this->cache = \Config\Services::cache();
    }

    public function generateQuizQuestions($content, $numQuestions = 5) {
        if ($this->isRateLimited()) {
            throw new Exception('API rate limit exceeded. Please wait a minute.');
        }

        $prompt = "Create {$numQuestions} multiple choice questions based on this content. Format as JSON array with objects containing: 
            1. question_text (string)
            2. options (array of 4 strings)
            3. correct_answer_index (number 0-3)
            Content: " . substr($content, 0, 4000);

        try {
            $response = $this->makeRequest($prompt);
            $this->incrementRateLimit();
            return $this->parseResponse($response);
        } catch (Exception $e) {
            log_message('error', 'Gemini API error: ' . $e->getMessage());
            throw new Exception('Failed to generate questions: ' . $e->getMessage());
        }
    }

    private function isRateLimited(): bool {
        $count = (int) $this->cache->get('gemini_api_count') ?? 0;
        return $count >= $this->rateLimitPerMin;
    }

    private function incrementRateLimit(): void {
        $count = (int) $this->cache->get('gemini_api_count') ?? 0;
        $this->cache->save('gemini_api_count', $count + 1, 60);
    }

    private function makeRequest($data) {
        $ch = curl_init($this->apiEndpoint . '?key=' . $this->apiKey);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }

    private function parseResponse($response) {
        if (!isset($response['candidates'][0]['content']['parts'][0]['text'])) {
            return null;
        }

        try {
            $generatedText = $response['candidates'][0]['content']['parts'][0]['text'];
            return json_decode($generatedText, true);
        } catch (\Exception $e) {
            return null;
        }
    }
}
