<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskSubmissionModel extends Model
{
    protected $table = 'task_submissions';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'task_id',
        'student_id',
        'file_path',
        'score',
        'status',
        'submitted_at',
        'graded_at',
        'graded_by'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'submitted_at';
    protected $updatedField = 'graded_at';

    public function getStudentSubmissions($studentId)
    {
        return $this->select('
                task_submissions.*,
                tasks.title as task_name,
                users.name as grader_name
            ')
            ->join('tasks', 'tasks.id = task_submissions.task_id')
            ->join('users', 'users.id = task_submissions.graded_by', 'left')
            ->where('task_submissions.student_id', $studentId)
            ->findAll();
    }
}
