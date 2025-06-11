<?php

namespace App\Controllers;

class Course extends BaseController
{
    public function index()
    {
        // Dummy data instead of SQL
        $data['courses'] = [
            ['id' => 1, 'course_name' => 'Sample Course 1'],
            ['id' => 2, 'course_name' => 'Sample Course 2']
        ];

        return view('courses/index', $data);
    }

    public function edit($id)
    {
        // Dummy data
        $data['course'] = ['id' => $id, 'course_name' => 'Sample Course ' . $id];

        return view('courses/edit', $data);
    }

    public function update($id)
    {
        // Simulate update success
        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Course updated'
            ]);
        }

        return redirect()->to('/course');
    }

    public function delete($id)
    {
        // Simulate delete success
        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Course deleted'
            ]);
        }

        return redirect()->to('/course');
    }

    public function view($id = null)
    {
        // Dummy courses and lessons
        $courses = [
            ['id' => 1, 'course_name' => 'Sample Course 1'],
            ['id' => 2, 'course_name' => 'Sample Course 2']
        ];
        $lessons = [];
        if ($id) {
            $lessons = [
                ['id' => 1, 'title' => 'Lesson 1', 'course_id' => $id],
                ['id' => 2, 'title' => 'Lesson 2', 'course_id' => $id]
            ];
        }

        return view('course_view', [
            'courses' => $courses,
            'lessons' => $lessons
        ]);
    }
}
