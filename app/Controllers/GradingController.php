<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class GradingController extends BaseController
{
    public function previewQuiz()
    {
        return view('grading/preview_quiz');
    }

    public function previewTask()
    {
        // You can pass task_id and submission_id to the view if needed
        $task_id = $this->request->getGet('task_id');
        $submission_id = $this->request->getGet('submission_id');
        return view('grading/preview_task', [
            'task_id' => $task_id,
            'submission_id' => $submission_id
        ]);
    }

    // ...existing methods...
}