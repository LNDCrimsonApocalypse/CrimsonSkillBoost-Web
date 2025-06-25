<?php

namespace App\Controllers;

class Enrollment extends BaseController
{
    public function index()
    {
        // Dummy pending requests
        $pendingRequests = [
            ['id' => 1, 'student_id' => 1, 'course_id' => 1, 'section' => 'A', 'status' => 'pending']
        ];
        return view('enrollment', ['requests' => $pendingRequests]);
    }

    public function submitRequest()
    {
        // Simulate insert
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Enrollment request submitted successfully'
        ]);
    }

    public function updateRequest($id)
    {
        // Simulate update
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Updated successfully'
        ]);
    }

    public function requests()
    {
        // Example data, replace with your actual data fetching logic
        $requests = [
            [
                'id' => 1,
                'student_name' => 'California Magpantay',
                'course_name' => 'Sample Course',
                'section' => 'A',
                'status' => 'pending'
            ],
            // ...add more requests as needed...
        ];

        return view('enrollment_req', ['requests' => $requests]);
    }

    public function apiSubmit()
    {
        // Simulate API submit
        return $this->response->setJSON(['success' => true]);
    }

    public function apiStudentRequests($studentId)
    {
        // Dummy data
        $requests = [
            ['id' => 1, 'student_id' => $studentId, 'course_id' => 1, 'section' => 'A', 'status' => 'pending']
        ];
        return $this->response->setJSON([
            'success' => true,
            'requests' => $requests
        ]);
    }

    public function apiCourseRequests($courseId)
    {
        // Dummy data
        $requests = [
            ['id' => 1, 'student_id' => 1, 'course_id' => $courseId, 'section' => 'A', 'status' => 'pending']
        ];
        return $this->response->setJSON([
            'success' => true,
            'requests' => $requests
        ]);
    }

    public function apiUpdateStatus($id)
    {
        // Simulate update
        return $this->response->setJSON(['success' => true]);
    }

    public function apiPending()
    {
        // Dummy pending requests
        $pending = [
            ['id' => 1, 'student_id' => 1, 'course_id' => 1, 'section' => 'A', 'status' => 'pending']
        ];
        return $this->response->setJSON([
            'success' => true,
            'requests' => $pending
        ]);
    }

    public function enrollInCourse()
    {
        // Simulate enroll
        return $this->response->setJSON(['success' => true]);
    }
}
