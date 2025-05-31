<?php

namespace App\Controllers;

use App\Models\EnrollmentModel;
use App\Models\CourseModel;

class Enrollment extends BaseController
{
    public function index()
    {
        $enrollmentModel = new EnrollmentModel();
        $pendingRequests = $enrollmentModel->getPendingRequests();
        
        return view('enrollment', ['requests' => $pendingRequests]);
    }

    public function submitRequest()
    {
        $enrollmentModel = new EnrollmentModel();
        
        $data = [
            'student_id' => $this->request->getPost('student_id'),
            'course_id' => $this->request->getPost('course_id'),
            'section' => $this->request->getPost('section'),
            'status' => 'pending'
        ];

        if ($enrollmentModel->insert($data)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Enrollment request submitted successfully'
            ]);
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Failed to submit enrollment request'
        ]);
    }

    public function updateRequest($id)
    {
        $enrollmentModel = new EnrollmentModel();
        $status = $this->request->getPost('status');
        
        if ($enrollmentModel->update($id, ['status' => $status])) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Request ' . $status . ' successfully'
            ]);
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Failed to update request'
        ]);
    }
}
