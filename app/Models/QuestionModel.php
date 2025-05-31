<?php
namespace App\Models;

use CodeIgniter\Model;

class QuestionModel extends Model
{
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

    // Helper function to format options before save
    public function formatOptions($options)
    {
        return json_encode($options);
    }

    // Helper function to get options after fetch
    public function getOptions($jsonOptions)
    {
        return json_decode($jsonOptions, true);
    }
}
