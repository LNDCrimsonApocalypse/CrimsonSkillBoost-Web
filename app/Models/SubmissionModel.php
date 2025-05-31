<?php

namespace App\Models;

use CodeIgniter\Model;

class SubmissionModel extends Model
{
    protected $table = 'submissions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['score', 'status'];
    protected $returnType = 'array';

    public function getTaskSubmissions($taskId)
    {
        return $this->where('task_id', $taskId)
                   ->select('submissions.*, students.name as student_name')
                   ->join('students', 'students.id = submissions.student_id')
                   ->findAll();
    }
}
