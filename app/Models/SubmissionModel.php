<?php

namespace App\Models;

use CodeIgniter\Model;

class SubmissionModel extends Model
{
    protected $table = 'submissions';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'student_id',
        'task_id',
        'score',
        'status',
        'submitted_at',
        'graded_at'
    ];
    protected $useTimestamps = false;
    protected $returnType = 'array';

    public function getTaskSubmissions($taskId)
    {
        return $this->where('task_id', $taskId)
                   ->select('submissions.*, students.name as student_name')
                   ->join('students', 'students.id = submissions.student_id')
                   ->orderBy('submissions.submitted_at', 'DESC')
                   ->findAll();
    }

    public function getRecentSubmissions($limit = 5)
    {
        return $this->select('submissions.*, students.name as student_name, tasks.title as task_title, students.id as student_id')
                   ->join('students', 'students.id = submissions.student_id')
                   ->join('tasks', 'tasks.id = submissions.task_id')
                   ->orderBy('submissions.submitted_at', 'DESC')
                   ->limit($limit)
                   ->get()
                   ->getResultArray();
    }

    public function getStudentGrades($studentId)
    {
        return $this->select('submissions.*, tasks.title as task_title')
                   ->join('tasks', 'tasks.id = submissions.task_id')
                   ->where('submissions.student_id', $studentId)
                   ->where('submissions.status', 'graded')
                   ->findAll();
    }
}
