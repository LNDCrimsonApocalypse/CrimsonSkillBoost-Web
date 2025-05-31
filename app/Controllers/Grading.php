<?php

namespace App\Controllers;

use App\Models\SubmissionModel;

class Grading extends BaseController
{
    public function overview()
    {
        $submissionModel = new SubmissionModel();
        $submissions = $submissionModel->select('submissions.*, students.name as student_name, tasks.title as task_title')
            ->join('students', 'students.id = submissions.student_id')
            ->join('tasks', 'tasks.id = submissions.task_id')
            ->orderBy('submissions.submitted_at', 'DESC')
            ->get()
            ->getResultArray();

        return view('grading/overview', [
            'submissions' => $submissions
        ]);
    }
}
