<?php

namespace App\Controllers;
use App\Models\LessonModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $lessonModel = new LessonModel();
        $data['lessons'] = $lessonModel->findAll();

        // Debug: see if data is fetched
        // echo '<pre>'; print_r($data['lessons']); exit;

        return view('dashboard', $data);
    }
}
