<?php

namespace App\Controllers;

use App\Models\CourseModel;
use CodeIgniter\Controller;

class Course extends Controller
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
}
