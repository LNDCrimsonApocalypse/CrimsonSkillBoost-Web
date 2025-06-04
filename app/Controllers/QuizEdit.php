<?php

namespace App\Controllers;

class QuizEdit extends BaseController
{
    public function index($id = null)
    {
        // Example: Fetch quiz and questions from your model/database
        // Replace this with your actual fetching logic
        $quiz = [
            'id' => $id,
            'title' => 'Sample Quiz',
            'description' => 'Sample description',
            'start_date' => '2024-06-01 08:00:00',
            'end_date' => '2024-06-10 17:00:00',
            'passing_score' => 60
        ];
        $questions = [
            ['id' => 1, 'question_text' => 'Sample question 1', 'correct_answer' => 0],
            ['id' => 2, 'question_text' => 'Sample question 2', 'correct_answer' => 1]
        ];

        return view('quiz_edit', [
            'quiz' => $quiz,
            'questions' => $questions
        ]);
    }
}
