<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class GradingController extends BaseController
{
    public function previewQuiz()
    {
        return view('grading/preview_quiz');
    }

    // ...existing methods...
}