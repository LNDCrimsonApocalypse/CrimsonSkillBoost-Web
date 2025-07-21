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

    // Change this method to use quiz_list1 view instead of quiz_list
    public function quizList()
    {
        $course_id = $this->request->getGet('course_id');
        $course_title = 'Course';
        // If you have a model or DB connection, fetch the course title here
        // Example (pseudo-code):
        // $course = $this->courseModel->find($course_id);
        // if ($course) $course_title = $course['course_name'];

        // Pass both id and title to the view, and also $course_id as a top-level variable
        return view('quiz_list1', [
            'course' => ['id' => $course_id, 'title' => $course_title],
            'course_id' => $course_id // <-- add this line
        ]);
    }

    public function resultQuiz()
    {
        return view('result_quiz');
    }
}
