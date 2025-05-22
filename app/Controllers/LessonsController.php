<?php

namespace App\Controllers;

use App\Models\LessonModel;

class LessonsController extends BaseController
{
    public function index()
    {
        $lessonModel = new LessonModel();
        $data['lessons'] = $lessonModel->findAll(); // Fetch all lessons

        // Debug step: check if data exists
        dd($data['lessons']);

        return view('dashboard', $data);
    }
    public function edit($id)
    {
        $model = new LessonModel();
        $lesson = $model->find($id);

        if (!$lesson) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Lesson not found.");
        }

        return view('lessons/edit', ['lesson' => $lesson]);
    }

    public function update($id)
    {
        $model = new LessonModel();

        $data = [
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
        ];

        $model->update($id, $data);

        return redirect()->to('/dashboard')->with('success', 'Lesson updated successfully');
    }
}
