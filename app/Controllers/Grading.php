<?php

namespace App\Controllers;

use App\Models\SubmissionModel;
use App\Models\StudentModel;

class Grading extends BaseController
{
    public function overview($id = null)
    {
        // Example: Fetch submissions for the given $id (e.g., task or quiz)
        // Replace this with your actual fetching logic
        $submissions = [
            [
                'id' => 1,
                'student_name' => 'Juan Dela Cruz',
                'task_title' => 'Task 1',
                'submitted_at' => '2024-06-01',
                'status' => 'graded',
                'score' => 95
            ],
            [
                'id' => 2,
                'student_name' => 'Maria Santos',
                'task_title' => 'Task 2',
                'submitted_at' => '2024-06-02',
                'status' => 'pending',
                'score' => null
            ]
        ];

        return view('grading/overview', [
            'submissions' => $submissions
        ]);
    }

    public function student_overview($id = null)
    {
        // Example: Fetch student and submissions from your model/database
        // Replace this with your actual fetching logic
        $student = [
            'id' => $id,
            'name' => 'Juan Dela Cruz',
            'email' => 'juan@example.com'
        ];
        $submissions = [
            [
                'id' => 1,
                'task_title' => 'Task 1',
                'submitted_at' => '2024-06-01 10:00:00',
                'score' => 95
            ],
            [
                'id' => 2,
                'task_title' => 'Task 2',
                'submitted_at' => '2024-06-02 14:30:00',
                'score' => null
            ]
        ];

        return view('grading/student_overview', [
            'student' => $student,
            'submissions' => $submissions
        ]);
    }

    public function save($submissionId)
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid request method'
            ])->setStatusCode(400);
        }

        try {
            $submissionModel = new SubmissionModel();
            $json = $this->request->getJSON();
            
            if (!isset($json->score)) {
                throw new \Exception('Score is required');
            }

            $score = (float) $json->score;
            if ($score < 0 || $score > 100) {
                throw new \Exception('Score must be between 0 and 100');
            }

            $submissionModel->update($submissionId, [
                'score' => $score,
                'status' => 'graded',
                'graded_at' => date('Y-m-d H:i:s')
            ]);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Grade saved successfully'
            ]);

        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => $e->getMessage()
            ])->setStatusCode(400);
        }
    }
}
