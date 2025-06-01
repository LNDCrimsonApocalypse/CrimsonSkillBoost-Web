<?php
namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\CourseModel;
use App\Models\SubmissionModel;

class Task extends BaseController
{
    public function startTaskCreation()
    {
        // Initialize task creation flow
        return redirect()->to('task/assign');
    }

    public function showAssignForm()
    {
        $courseModel = new CourseModel();
        return view('task_assign', [
            'courses' => $courseModel->findAll()
        ]);
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

        // Get session data
        $session = session();
        
        $taskModel = new TaskModel();
        $data = [
            'title' => $this->request->getPost('task_name'),
            'description' => $this->request->getPost('description'),
            'year' => $session->get('year'),
            'section' => $session->get('section'),
            'semester' => $session->get('semester'),
            'courses' => json_encode($session->get('courses')),
            'created_by' => 1
        ];

        // First insert the basic task data
        if (!$taskModel->insert($data)) {
            return redirect()->back()->with('error', 'Failed to create task');
        }

        // Get the inserted ID
        $taskId = $taskModel->getInsertID();

        // Handle file upload if exists
        $file = $this->request->getFile('import_content');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Store in writable/uploads/tasks directory
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads/tasks', $newName);
            // Save the relative path
            $taskModel->update($taskId, ['file_path' => 'tasks/' . $newName]);
        }

        return redirect()->to("/task/duedate/$taskId");
    }

    public function showDueDateForm($taskId)
    {
        $taskModel = new TaskModel();
        $task = $taskModel->find($taskId);
        if (!$task) {
            return redirect()->to('/task/assign')->with('error', 'Task not found');
        }
        return view('duedate_task', ['task' => $task]);
    }

    public function processDueDate($taskId)
    {
        $taskModel = new TaskModel();
        $taskModel->update($taskId, [
            'start_date' => $this->request->getPost('start_date'),
            'end_date' => $this->request->getPost('end_date'),
            'allow_late' => $this->request->getPost('allow_late') ? 1 : 0,
            'attempts' => $this->request->getPost('attempts'),
        ]);
        return redirect()->to("/task/result/$taskId");
    }

    public function result($taskId = null)
    {
        $taskModel = new TaskModel();
        
        // If no ID provided, get the most recent task
        if (!$taskId) {
            $task = $taskModel->orderBy('created_at', 'DESC')->first();
            if (!$task) {
                return redirect()->to('/task/assign')->with('error', 'No tasks found');
            }
            $taskId = $task['id'];
        } else {
            $task = $taskModel->find($taskId);
        }

        // Get all tasks
        $allTasks = $taskModel->orderBy('created_at', 'DESC')->findAll();
        
        if (!$task) {
            return redirect()->to('/task/assign')->with('error', 'Task not found');
        }
        
        return view('result_task', [
            'task' => $task,
            'allTasks' => $allTasks
        ]);
    }

    public function download($taskId)
    {
        $taskModel = new TaskModel();
        $task = $taskModel->find($taskId);

        if (!$task || empty($task['file_path'])) {
            return redirect()->back()->with('error', 'File not found');
        }

        $path = WRITEPATH . 'uploads/' . $task['file_path'];
        
        if (!file_exists($path)) {
            return redirect()->back()->with('error', 'File not found on server');
        }

        // Fix: Add a dot before the extension
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        $filename = $task['title'] . '.' . $extension;

        return $this->response->download($path, null)->setFileName($filename);
    }

    public function getSubmissions($taskId)
    {
        header('Content-Type: application/json'); // Force JSON content type
        $submissionModel = new SubmissionModel();
        
        try {
            $submissions = $submissionModel->getTaskSubmissions($taskId);
            
            return $this->response->setJSON([
                'success' => true,
                'submissions' => array_map(function($sub) {
                    return [
                        'id' => $sub['id'],
                        'student_name' => $sub['student_name'],
                        'status' => $sub['status'],
                        'score' => $sub['score'],
                        'submitted_at' => date('M d, Y h:i A', strtotime($sub['submitted_at'])),
                        'file_path' => $sub['file_path']
                    ];
                }, $submissions)
            ])->setContentType('application/json');

        } catch (\Exception $e) {
            log_message('error', 'Error fetching submissions: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error fetching submissions: ' . $e->getMessage()
            ])->setStatusCode(500)->setContentType('application/json');
        }
    }

    public function grade($submissionId)
    {
        try {
            $submissionModel = new \App\Models\SubmissionModel();
            
            $json = $this->request->getJSON();
            if (!$json || !isset($json->score)) {
                throw new \Exception('Score is required');
            }

            $score = (float) $json->score;
            if ($score < 0 || $score > 100) {
                throw new \Exception('Score must be between 0 and 100');
            }

            $success = $submissionModel->update($submissionId, [
                'score' => $score,
                'status' => 'graded',
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            if (!$success) {
                throw new \Exception('Failed to update submission');
            }

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Grade saved successfully'
            ]);

        } catch (\Exception $e) {
            log_message('error', 'Grade error: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => $e->getMessage()
            ])->setStatusCode(400);
        }
    }

    // Add delete method
    public function delete($taskId)
    {
        $taskModel = new TaskModel();
        $taskModel->delete($taskId);
        return redirect()->to('/dashboard')->with('success', 'Task deleted successfully');
    }
}
