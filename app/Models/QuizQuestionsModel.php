<?php
namespace App\Models;

use CodeIgniter\Model;

class QuizQuestionsModel extends Model
{
    protected $table = 'question';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'quiz_id',
        'question_text'
    ];
    protected $useTimestamps = true;
}
