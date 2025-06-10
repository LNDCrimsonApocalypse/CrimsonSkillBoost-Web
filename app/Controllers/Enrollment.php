<?php

namespace App\Controllers;

use App\Models\EnrollmentRequestModel;
use App\Models\EnrollmentModel;

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

            log_message('debug', 'Enrollment requests: ' . json_encode($requests));

            if (!is_array($requests)) {
                $requests = [];
            }

            return view('enrollment_req', ['requests' => $requests]);
        } catch (\Throwable $e) {
            log_message('error', 'Error in Enrollment::requests - ' . $e->getMessage());
            return "Error: " . $e->getMessage();
        }
    }

    // --- ANDROID API ENHANCEMENTS ---

    // API: Submit enrollment request (POST/JSON)
    public function apiSubmit()
    {
        $json = $this->request->getJSON(true);
        if (!$json) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid JSON'
            ])->setStatusCode(400);
        }

        $studentId = $json['student_id'] ?? null;
        $courseId = $json['course_id'] ?? null;
        $section = $json['section'] ?? null;

        if (!$studentId || !$courseId || !$section) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Missing student_id, course_id, or section'
            ])->setStatusCode(400);
        }

        $enrollmentModel = new EnrollmentModel();
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

    // API: Get all enrollment requests for a student (GET)
    public function apiStudentRequests($studentId)
    {
        $enrollmentModel = new EnrollmentModel();
        $requests = $enrollmentModel
            ->where('student_id', $studentId)
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return $this->response->setJSON([
            'success' => true,
            'requests' => $requests
        ]);
    }

    // API: Get all enrollment requests for a course (GET)
    public function apiCourseRequests($courseId)
    {
        $enrollmentModel = new EnrollmentModel();
        $requests = $enrollmentModel
            ->where('course_id', $courseId)
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return $this->response->setJSON([
            'success' => true,
            'requests' => $requests
        ]);
    }

    // API: Update enrollment status (POST/JSON)
    public function apiUpdateStatus($id)
    {
        $json = $this->request->getJSON(true);
        if (!$json || !isset($json['status'])) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Missing status'
            ])->setStatusCode(400);
        }

        $status = $json['status'];
        if (!in_array($status, ['approved', 'rejected', 'pending'])) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid status value'
            ])->setStatusCode(400);
        }

        $enrollmentModel = new EnrollmentModel();
        $result = $enrollmentModel->update($id, ['status' => $status]);

        if ($result) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to update status'
            ])->setStatusCode(500);
        }
    }

    // API: Get all pending requests (GET)
    public function apiPending()
    {
        $enrollmentModel = new EnrollmentModel();
        $pending = $enrollmentModel->where('status', 'pending')->findAll();
        return $this->response->setJSON([
            'success' => true,
            'requests' => $pending
        ]);
    }

    // --- END ANDROID API ENHANCEMENTS ---

    // Add: API endpoint for Android enrollment request (legacy/fallback)
    public function enrollInCourse()
    {
        $studentId = $this->request->getGet('student_id') ?? $this->request->getPost('student_id');
        $courseId = $this->request->getGet('course_id') ?? $this->request->getPost('course_id');
        $section = $this->request->getGet('section') ?? $this->request->getPost('section');

        if (!$studentId || !$courseId || !$section) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Missing student_id, course_id, or section'
            ])->setStatusCode(400);
        }

        $enrollmentModel = new EnrollmentModel();
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
