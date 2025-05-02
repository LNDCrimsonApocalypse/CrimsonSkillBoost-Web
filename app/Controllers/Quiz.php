<?php

namespace App\Controllers;

class Quiz extends BaseController
{
    public function index()
    {
        helper('Gemini');

        $topic = $this->request->getGet('topic') ?? 'science';
        $quizQuestion = getQuizQuestionFromGemini($topic);

        return view('quiz_view', ['question' => $quizQuestion]);
    }
}
