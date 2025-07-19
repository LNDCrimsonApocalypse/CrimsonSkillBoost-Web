<?php

namespace App\Controllers;

class TaskList extends BaseController
{
    public function index()
    {
        $course_id = $this->request->getGet('course_id');
        $course_title = 'Course';
        // You can fetch the course title from your DB/model if needed

        // Pass both id and title to the view for consistency
        return view('task_list', ['course' => ['id' => $course_id, 'title' => $course_title]]);
    }
}
