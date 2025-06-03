<?php
namespace App\Models;

use CodeIgniter\Model;

class QuizQuestionsModel extends Model
{
    // Use the correct table name
    protected $table = 'questions';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'quiz_id',
        'question_text',
        'options',
        'correct_answer'
    ];
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
}
