<?php

namespace App\Controllers;

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
        $json = $this->request->getJSON();
        
        if (!$json || !isset($json->status)) {
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => 'Missing status'
            ]);
        }

        $enrollmentModel = new \App\Models\EnrollmentModel();
        
        try {
            $enrollmentModel->update($id, ['status' => $json->status]);
            
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Status updated successfully'
            ]);

        } catch (\Exception $e) {
            log_message('error', '[Enrollment] Update failed: ' . $e->getMessage());
            
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'message' => 'Failed to update status'
            ]);
        }
    }
}
