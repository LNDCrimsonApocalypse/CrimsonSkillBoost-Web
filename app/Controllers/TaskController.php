<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class TaskController extends Controller
{
    public function taskHistory()
    {
        return view('taskhistory');
    }
}
