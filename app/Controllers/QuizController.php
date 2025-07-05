<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class QuizController extends Controller
{
    public function questionsQuiz()
    {
        $course_id = $this->request->getGet('course_id');
        return view('questionsquiz', ['course_id' => $course_id]);
    }
    
    public function questionsQuiz2()
    {
        return view('questionsquiz2');
    }

    // Add this method for quiz_list route
    public function quizList()
    {
        $course_id = $this->request->getGet('course_id');
        // Try to fetch course title from Firestore if possible
        $course_title = 'Course';
        // If you have a model or DB connection, fetch the course title here
        // Example (pseudo-code):
        // $course = $this->courseModel->find($course_id);
        // if ($course) $course_title = $course['course_name'];

        // Pass both id and title to the view
        return view('quiz_list', ['course' => ['id' => $course_id, 'title' => $course_title]]);
    }

    public function resultQuiz()
    {
        return view('result_quiz');
    }
}
