<?php

namespace App\Controllers;

use App\Models\LessonModel;

class LessonsController extends BaseController
{
    public function index()
    {
        $lessonModel = new LessonModel();
        $data['lessons'] = $lessonModel->findAll(); // Fetch all lessons

        // Debug step: check if data exists
        dd($data['lessons']);

        return view('dashboard', $data);
    }
}
