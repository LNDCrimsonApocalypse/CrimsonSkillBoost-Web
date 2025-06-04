<?php

namespace App\Controllers;

class ResultQuiz extends BaseController
{
    public function index($id = null)
    {
        // Example: Fetch quiz, questions, and allQuizzes from your model/database
        // Replace this with your actual fetching logic
        $quiz = [
            'id' => $id,
            'title' => 'Sample Quiz',
            'start_date' => '2024-06-01',
            'end_date' => '2024-06-10',
            'created_at' => '2024-06-01'
        ];
        $questions = [
            ['question_text' => 'Sample question 1'],
            ['question_text' => 'Sample question 2'],
            ['question_text' => 'Sample question 3'],
            ['question_text' => 'Sample question 4']
        ];
        $allQuizzes = [
            $quiz,
            [
                'id' => 2,
                'title' => 'Another Quiz',
                'created_at' => '2024-05-20'
            ]
        ];

        return view('result_quiz', [
            'quiz' => $quiz,
            'questions' => $questions,
            'allQuizzes' => $allQuizzes
        ]);
    }
}
