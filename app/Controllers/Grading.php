<?php

namespace App\Controllers;

class Grading extends BaseController
{
    public function index()
    {
        // Pass data to the view if needed
        return view('grading/grading');
    }

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

        // Simulate grade save
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Grade saved successfully'
        ]);
    }

    public function edit()
    {
        // You can pass data to the view if needed
        return view('grading/edit');
    }

    public function studentprog($course_id = null)
    {
        // Support both /studentprog/{course_id} and /studentprog?course_id=...
        if (!$course_id) {
            $course_id = $this->request->getGet('course_id');
        }
        return view('grading/studentprog', ['course_id' => $course_id]);
    }

    public function previewgrade()
    {
        // You can pass data to the view if needed
        return view('grading/previewgrade');
    }

    public function gradingsettings()
    {
        // You can pass user info if needed, e.g. $userId = session('user_id');
        return view('grading/gradingsettings');
    }
}
