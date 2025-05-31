<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'student_number',
        'year_level',
        'section',
        'course',
        'academic_status'
    ];
    
    protected $returnType = 'array';

    public function getStudentWithGrades($studentId)
    {
        return $this->select('
                students.*, 
                users.name,
                users.email,
                COALESCE(AVG(task_submissions.score), 0) as average_task_score,
                COALESCE(AVG(quiz_submissions.score), 0) as average_quiz_score
            ')
            ->join('users', 'users.id = students.user_id')
            ->join('task_submissions', 'students.id = task_submissions.student_id', 'left')
            ->join('quiz_submissions', 'students.id = quiz_submissions.student_id', 'left')
            ->where('students.id', $studentId)
            ->first();
    }

    public function getClassGrades($section)
    {
        return $this->select('
                students.*, 
                users.name,
                COUNT(DISTINCT task_submissions.id) as total_tasks,
                COUNT(DISTINCT quiz_submissions.id) as total_quizzes,
                COALESCE(AVG(task_submissions.score), 0) as task_average,
                COALESCE(AVG(quiz_submissions.score), 0) as quiz_average
            ')
            ->join('users', 'users.id = students.user_id')
            ->join('task_submissions', 'students.id = task_submissions.student_id', 'left')
            ->join('quiz_submissions', 'students.id = quiz_submissions.student_id', 'left')
            ->where('students.section', $section)
            ->groupBy('students.id')
            ->findAll();
    }
}
