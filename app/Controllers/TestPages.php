<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class TestPages extends Controller
{
    public function uploadLesson()
    {
        // Renders the view located at app/Views/upload_lesson.php
        return view('upload_lessons');
    }

    public function calculateGrade()
    {
        // Renders the view located at app/Views/calculate_grade.php
        return view('calculate_grade');
    }
}
