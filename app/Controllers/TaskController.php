<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class TaskController extends Controller
{
    public function taskHistory()
    {
        return view('taskhistory');
    }
    
    public function resultTask($id)
    {
        // Fetch task and allTasks from your model/database
        $taskModel = model('TaskModel');
        $task = $taskModel->find($id);
        $allTasks = $taskModel->findAll();

        return view('result_task', [
            'task' => $task,
            'allTasks' => $allTasks
        ]);
    }
}
