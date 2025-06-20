<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class CourseController extends Controller
{
    public function description()
    {
        return view('course_descrip');
    }

    public function allcourses2()
    {
        return view('allcourses2');
    }
}
