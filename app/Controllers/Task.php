<?php
namespace App\Controllers;

class Task extends BaseController
{
    public function startTaskCreation()
    {
        // Store course_id in session for later steps
        $courseId = $this->request->getPost('course_id');
        if ($courseId) {
            session()->set('course_id', $courseId);
        }
        // Do not redirect or return JSON; just end for modal flow
        exit;
    }

    public function showAssignForm()
    {
        // Not used in modal flow
        exit;
    }

    public function processAssign()
    {
        // Store selected courses in session
        $session = session();
        $session->set([
            'year' => $this->request->getPost('year'),
            'section' => $this->request->getPost('section'),
            'semester' => $this->request->getPost('semester'),
            'courses' => $this->request->getPost('courses')
        ]);
        return redirect()->to('task/upload');
    }

    public function showUploadForm()
    {
        $session = session();
        $taskData = [
            'year' => $session->get('year'),
            'section' => $session->get('section'),
            'semester' => $session->get('semester'),
            'courses' => $session->get('courses')
        ];

        // Check if we have the required session data
        if (!$taskData['year'] || !$taskData['section'] || !$taskData['semester']) {
            return redirect()->to('task/assign')
                           ->with('error', 'Please select year, section and semester first');
        }

        return view('upload_task', ['taskData' => $taskData]);
    }

    public function processUpload()
    {
        if (!$this->request->getPost('task_name')) {
            return redirect()->back()->with('error', 'Task name required');
        }

        // Simulate task creation and file upload
        $taskId = 1; // Dummy ID

        // Handle file upload if exists (simulate)
        // ...existing code...

        return redirect()->to("/task/duedate/$taskId");
    }

    public function showDueDateForm($taskId)
    {
        // Dummy task
        $task = [
            'id' => $taskId,
            'title' => 'Sample Task',
            'description' => 'Sample description',
            'start_date' => '2024-06-01',
            'end_date' => '2024-06-10',
            'file_path' => null
        ];
        return view('duedate_task', ['task' => $task]);
    }

    public function processDueDate($taskId)
    {
        // Simulate update
        return redirect()->to("/task/result/$taskId");
    }

    public function result($taskId = null)
    {
        // Dummy tasks
        $allTasks = [
            [
                'id' => 1,
                'title' => 'Sample Task',
                'description' => 'Sample description',
                'start_date' => '2024-06-01',
                'end_date' => '2024-06-10',
                'file_path' => null
            ]
        ];
        $task = $allTasks[0];

        return view('result_task', [
            'task' => $task,
            'allTasks' => $allTasks
        ]);
    }

    public function download($taskId)
    {
        // Simulate file download error
        return redirect()->back()->with('error', 'File not found');
    }

    public function getSubmissions($taskId)
    {
        header('Content-Type: application/json');
        // Dummy submissions
        $submissions = [
            [
                'id' => 1,
                'student_name' => 'Juan Dela Cruz',
                'status' => 'graded',
                'score' => 95,
                'submitted_at' => '2024-06-01 10:00:00',
                'file_path' => 'tasks/sample.pdf'
            ]
        ];
        return $this->response->setJSON([
            'success' => true,
            'submissions' => $submissions
        ])->setContentType('application/json');
    }

    public function grade($submissionId)
    {
        // Simulate grading
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Grade saved successfully'
        ]);
    }

    // Add delete method
    public function delete($taskId)
    {
        // Simulate delete
        return redirect()->to('/dashboard')->with('success', 'Task deleted successfully');
    }
}
