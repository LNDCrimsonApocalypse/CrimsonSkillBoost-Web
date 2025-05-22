<?php

namespace App\Controllers;

use App\Models\LessonModel;

class Lesson extends BaseController
{
    public function view($id)
    {
        $lessonModel = new LessonModel();
        $lesson = $lessonModel->find($id);

        if (!$lesson) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Lesson not found");
        }

        return view('lessons/view', ['lesson' => $lesson]);
    }

    public function index()
    {
        $lessonModel = new LessonModel();
        $lessons = $lessonModel->findAll();
        return view('lesson_list', ['lessons' => $lessons]);
    }
}
