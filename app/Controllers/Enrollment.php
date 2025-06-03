<?php

namespace App\Controllers;

use App\Models\EnrollmentRequestModel;
use App\Models\EnrollmentModel; // Ensure this is imported

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

    public function requests()
    {
        try {
            $model = new EnrollmentRequestModel();
            $requests = $model->findAll();

            // Debug: log the result
            log_message('debug', 'Enrollment requests: ' . json_encode($requests));

            // Fallback if $requests is not an array
            if (!is_array($requests)) {
                $requests = [];
            }

            return view('enrollment_req', ['requests' => $requests]);
        } catch (\Throwable $e) {
            log_message('error', 'Error in Enrollment::requests - ' . $e->getMessage());
            // Show a simple error message for debugging
            return "Error: " . $e->getMessage();
        }
    }

    // Add: API endpoint for Android enrollment request
    public function enrollInCourse()
    {
        // Accept both GET and POST for flexibility
        $studentId = $this->request->getGet('student_id') ?? $this->request->getPost('student_id');
        $courseId = $this->request->getGet('course_id') ?? $this->request->getPost('course_id');
        $section = $this->request->getGet('section') ?? $this->request->getPost('section');

        if (!$studentId || !$courseId || !$section) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Missing student_id, course_id, or section'
            ])->setStatusCode(400);
        }

        $enrollmentModel = new \App\Models\EnrollmentModel();
        $data = [
            'student_id' => $studentId,
            'course_id' => $courseId,
            'section' => $section,
            'status' => 'pending'
        ];

        if ($enrollmentModel->insert($data)) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to submit enrollment request'
            ])->setStatusCode(500);
        }
    }
}
