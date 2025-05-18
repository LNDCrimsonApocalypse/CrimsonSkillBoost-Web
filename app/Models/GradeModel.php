<?php

namespace App\Models;

use CodeIgniter\Model;

class GradeModel extends Model
{
    protected $table = 'grades';
    protected $allowedFields = ['educator_uid', 'student_id', 'grades', 'average', 'created_at'];
    protected $useTimestamps = false;
}
