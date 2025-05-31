<?php

namespace App\Models;

use CodeIgniter\Model;

class EnrollmentModel extends Model
{
    protected $table = 'enrollment_requests';
    protected $primaryKey = 'id';
    protected $allowedFields = ['student_id', 'course_id', 'section', 'status'];
    protected $useTimestamps = true;
    protected $returnType = 'array';

    public function getPendingRequests()
    {
        return $this->select('enrollment_requests.*, students.name as student_name, courses.course_name')
                    ->join('students', 'students.id = enrollment_requests.student_id')
                    ->join('courses', 'courses.id = enrollment_requests.course_id')
                    ->where('enrollment_requests.status', 'pending')
                    ->findAll();
    }
}
