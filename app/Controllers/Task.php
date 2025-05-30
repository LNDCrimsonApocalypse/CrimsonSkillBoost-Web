<?php
namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\CourseModel;

class Task extends BaseController
{
    // Step 1: Assign task to classes/courses
    public function assign()
    {
        $courseModel = new CourseModel();
        $courses = $courseModel->findAll();
        if ($this->request->getMethod() === 'post') {
            // Forward POST data to uploadTask view
            return view('upload_task', [
                'year' => $this->request->getPost('year'),
                'section' => $this->request->getPost('section'),
                'semester' => $this->request->getPost('semester'),
                'courses' => $this->request->getPost('courses'),
            ]);
        }
        return view('task_assign', [
            'courses' => $courses,
        ]);
    }

    // Step 2: Task upload/import/create
    public function uploadTask()
    {
        if ($this->request->getMethod() === 'post' && $this->request->getPost('task_name')) {
            $taskName = $this->request->getPost('task_name');
            $year = $this->request->getPost('year');
            $section = $this->request->getPost('section');
            $semester = $this->request->getPost('semester');
            $courses = $this->request->getPost('courses');
            $description = json_encode([
                'year' => $year,
                'section' => $section,
                'semester' => $semester,
                'courses' => $courses,
            ]);
            // Handle file upload
            $filePath = null;
            $file = $this->request->getFile('import_content');
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $filePath = $file->store('tasks');
            }
            $taskModel = new TaskModel();
            $taskId = $taskModel->insert([
                'title' => $taskName,
                'description' => $description,
                'created_by' => 1, // Replace with session user id
                'file_path' => $filePath,
            ]);
            // Pass taskId to due date step
            return redirect()->to('/task/duedate/' . $taskId);
        }
        // If GET or no POST data, show upload form (should not happen in normal flow)
        return view('upload_task');
    }

    // Step 3: Set due date/options
    public function duedate($taskId)
    {
        $taskModel = new TaskModel();
        if ($this->request->getMethod() === 'post') {
            $taskModel->update($taskId, [
                'start_date' => $this->request->getPost('start_date'),
                'end_date' => $this->request->getPost('end_date'),
                'allow_late' => $this->request->getPost('allow_late') ? 1 : 0,
                'attempts' => $this->request->getPost('attempts'),
            ]);
            return redirect()->to('/task/result/' . $taskId);
        }
        $task = $taskModel->find($taskId);
        return view('duedate_task', ['task' => $task]);
    }

    // Step 4: Show task summary/result
    public function result($taskId)
    {
        $taskModel = new TaskModel();
        $task = $taskModel->find($taskId);
        return view('result_task', ['task' => $task]);
    }
}
