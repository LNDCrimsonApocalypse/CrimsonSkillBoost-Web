<?php

namespace App\Models;

use CodeIgniter\Model;

class EnrollmentModel extends Model
{
    protected $table = 'enrollment_requests';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'student_id',
        'course_id',
        'section',
        'status'
    ];
    protected $useTimestamps = false;

    public function updateEnrollmentStatus($id, $status)
    {
        log_message('debug', "Attempting to update enrollment {$id} to {$status}");
        
        try {
            $result = $this->update($id, ['status' => $status]);
            log_message('debug', "Update result: " . ($result ? 'success' : 'failed'));
            log_message('debug', "Last query: " . $this->db->getLastQuery());
            return $result;
        } catch (\Exception $e) {
            log_message('error', "Update error: " . $e->getMessage());
            return false;
        }
    }

    public function getPendingRequests()
    {
        return $this->select('enrollment_requests.*, students.name as student_name, courses.course_name')
                    ->join('students', 'students.id = enrollment_requests.student_id', 'left')
                    ->join('courses', 'courses.id = enrollment_requests.course_id', 'left')
                    ->where('enrollment_requests.status', 'pending')
                    ->findAll();
    }
}
