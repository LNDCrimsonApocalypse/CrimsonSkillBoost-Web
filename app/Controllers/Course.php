<?php

namespace App\Controllers;

use App\Models\CourseModel;
use App\Models\LessonModel;

class Course extends BaseController
{
    public function index()
    {
        $model = new CourseModel();
        $data['courses'] = $model->findAll();

        return view('courses/index', $data);
    }

    public function edit($id)
    {
        $model = new CourseModel();
        $data['course'] = $model->find($id);

        return view('courses/edit', $data);
    }

    public function update($id)
    {
        $model = new CourseModel();
        $model->update($id, [
            'course_name' => $this->request->getPost('course_name')
        ]);

        return redirect()->to('/course');
    }

    public function delete($id)
    {
        $model = new CourseModel();
        $model->delete($id);

        return redirect()->to('/course');
    }

    public function view($id)
    {
        $courseModel = new CourseModel();
        $lessonModel = new LessonModel();

        $course = $courseModel->find($id);
        if (!$course) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Course not found");
        }

        $lessons = $lessonModel->where('course_id', $id)->findAll();

        return view('course_view', [
            'course' => $course,
            'lessons' => $lessons
        ]);
    }
}
