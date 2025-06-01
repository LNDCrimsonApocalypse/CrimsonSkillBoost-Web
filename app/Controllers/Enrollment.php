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
        // Set proper headers
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        
        try {
            $json = $this->request->getJSON();
            log_message('debug', 'Update request: ' . json_encode($json));
            
            if (!$json || !isset($json->status)) {
                throw new \Exception('Missing status');
            }

            if (!in_array($json->status, ['approved', 'rejected'])) {
                throw new \Exception('Invalid status value');
            }

            $enrollmentModel = new \App\Models\EnrollmentModel();
            $result = $enrollmentModel->update($id, [
                'status' => $json->status
            ]);

            if (!$result) {
                throw new \Exception('Failed to update record');
            }

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Updated successfully'
            ]);

        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
