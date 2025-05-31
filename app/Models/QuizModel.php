<?php
namespace App\Models;

use CodeIgniter\Model;

class QuizModel extends Model
{
    protected $table = 'quizzes';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'course_id',
        'title',
        'description',
        'start_date',
        'end_date',
        'allow_late',
        'attempts',
        'created_by',
        'topic_id'
    ];
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
}
