<?php

namespace App\Controllers;

class ResultTask extends BaseController
{
    public function index($id = null)
    {
        // Example: Fetch task and allTasks from your model/database
        // Replace this with your actual fetching logic
        $task = [
            'id' => $id,
            'title' => 'Sample Task',
            'description' => 'Sample description',
            'start_date' => '2024-06-01',
            'end_date' => '2024-06-10',
            'file_path' => null
        ];
        $allTasks = [$task]; // Replace with actual list

        return view('result_task', [
            'task' => $task,
            'allTasks' => $allTasks
        ]);
    }
}
