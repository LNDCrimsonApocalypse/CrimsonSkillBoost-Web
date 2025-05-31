<?php

namespace App\Controllers;

use App\Models\SubmissionModel;
use App\Models\StudentModel;

class Grading extends BaseController
{
    public function overview()
    {
        $submissionModel = new SubmissionModel();
        $submissions = $submissionModel->select('submissions.*, students.name as student_name, tasks.title as task_title')
            ->join('students', 'students.id = submissions.student_id')
            ->join('tasks', 'tasks.id = submissions.task_id')
            ->orderBy('submissions.submitted_at', 'DESC')
            ->get()
            ->getResultArray();

        return view('grading/overview', [
            'submissions' => $submissions
        ]);
    }

    public function studentOverview($studentId)
    {
        $studentModel = new StudentModel();
        $submissionModel = new SubmissionModel();

        $student = $studentModel->find($studentId);
        $submissions = $submissionModel->select('submissions.*, tasks.title as task_title')
            ->join('tasks', 'tasks.id = submissions.task_id')
            ->where('submissions.student_id', $studentId)
            ->orderBy('submissions.submitted_at', 'DESC')
            ->get()
            ->getResultArray();

        if (!$student) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('grading/student_overview', [
            'student' => $student,
            'submissions' => $submissions
        ]);
    }

    public function save($submissionId)
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid request method'
            ])->setStatusCode(400);
        }

        try {
            $submissionModel = new SubmissionModel();
            $json = $this->request->getJSON();
            
            if (!isset($json->score)) {
                throw new \Exception('Score is required');
            }

            $score = (float) $json->score;
            if ($score < 0 || $score > 100) {
                throw new \Exception('Score must be between 0 and 100');
            }

            $submissionModel->update($submissionId, [
                'score' => $score,
                'status' => 'graded',
                'graded_at' => date('Y-m-d H:i:s')
            ]);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Grade saved successfully'
            ]);

        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => $e->getMessage()
            ])->setStatusCode(400);
        }
    }
}
