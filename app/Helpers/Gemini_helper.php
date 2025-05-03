<?php

use CodeIgniter\HTTP\CURLRequest;

function getQuizQuestionFromGemini($topic = 'general knowledge')
{
    $apiKey = getenv('GEMINI_API_KEY');
    $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-pro:generateContent?key=' . $apiKey;

    $headers = [
        'Content-Type' => 'application/json'
    ];    

    $postData = [
        'contents' => [[
            'parts' => [[
                'text' => "Generate a single multiple choice question about $topic with 4 options and indicate the correct answer."
            ]]
        ]]
    ];

    $client = \Config\Services::curlrequest();
    $response = $client->request('POST', $url, [
        'headers' => $headers,
        'json' => $postData,
    ]);

    $body = json_decode($response->getBody(), true);

    // Extract the question
    return $body['candidates'][0]['content']['parts'][0]['text'] ?? 'No question received.';
}
