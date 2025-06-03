<?php

namespace App\Models;

use CodeIgniter\Model;

class EnrollmentRequestModel extends Model
{
    protected $table = 'enrollment_requests'; // Change to your table name
    protected $primaryKey = 'id';
    protected $allowedFields = ['student_name', 'course_name', 'section', 'status'];
}
