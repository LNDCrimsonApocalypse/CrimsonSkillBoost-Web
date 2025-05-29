<?php
namespace App\Controllers;

use App\Models\TaskModel;

class Task extends BaseController
{
    // Step 1: Task upload/import/create
    public function uploadTask()
    {
        if ($this->request->getMethod() === 'post') {
            $taskName = $this->request->getPost('task_name');
            $taskModel = new TaskModel();
            $taskId = $taskModel->insert([
                'title' => $taskName,
                'created_by' => 1, // Replace with session user id
            ]);
            return redirect()->to('/task/duedate/' . $taskId);
        }
        return view('upload_task');
    }

    // Step 2: Set due date/options
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

    // Step 3: Show task summary/result
    public function result($taskId)
    {
        $taskModel = new TaskModel();
        $task = $taskModel->find($taskId);
        return view('result_task', ['task' => $task]);
    }
}
