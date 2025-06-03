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
        if ($this->request->isAJAX()) {
            $courseModel = new \App\Models\CourseModel();
            $json = $this->request->getJSON(true);

            // Check for correct field and non-empty value
            if (!isset($json['course_name']) || trim($json['course_name']) === '') {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Course name is required'
                ]);
            }

            // Make sure 'course_name' is in allowedFields in your CourseModel
            $success = $courseModel->update($id, ['course_name' => $json['course_name']]);
            if ($success) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Course updated'
                ]);
            } else {
                // Show model errors for debugging
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Failed to update course',
                    'errors' => $courseModel->errors()
                ]);
            }
        }

        $model = new CourseModel();
        $model->update($id, [
            'course_name' => $this->request->getPost('course_name')
        ]);

        return redirect()->to('/course');
    }

    public function delete($id)
    {
        if ($this->request->isAJAX()) {
            $courseModel = new \App\Models\CourseModel();
            $success = $courseModel->delete($id);
            return $this->response->setJSON([
                'success' => $success,
                'message' => $success ? 'Course deleted' : 'Failed to delete course'
            ]);
        }

        $model = new CourseModel();
        $model->delete($id);

        return redirect()->to('/course');
    }

    public function view($id = null)
    {
        $courseModel = new CourseModel();
        $lessonModel = new LessonModel();

        // Fetch course and lessons from the database
        $course = $courseModel->find($id);
        $lessons = $lessonModel->where('course_id', $id)->findAll();

        // Pass data to the view
        return view('course_view', [
            'course' => $course,
            'lessons' => $lessons
        ]);
    }
}
