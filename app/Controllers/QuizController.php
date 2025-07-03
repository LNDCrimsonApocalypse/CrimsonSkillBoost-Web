<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class QuizController extends Controller
{
    public function questionsQuiz()
    {
        return view('questionsquiz');
    }
    
    public function questionsQuiz2()
    {
        return view('questionsquiz2');
    }
}
