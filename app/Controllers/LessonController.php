<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LessonController extends BaseController
{
    public function index()
    {
        return view('lesson_view');
    }
}
