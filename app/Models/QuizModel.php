<?php
namespace App\Models;

use CodeIgniter\Model;

class QuizModel extends Model
{
    protected $table = 'quizzes';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'title',
        'description',
        'year',
        'section',
        'semester',
        'courses',
        'start_date',
        'end_date',
        'duration',
        'total_questions',
        'passing_score',
        'allow_late',
        'attempts',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'title' => 'required|min_length[3]',
        'description' => 'permit_empty',
        'year' => 'required|numeric',
        'section' => 'required',
        'semester' => 'required|in_list[1,2,3]',
        'duration' => 'required|numeric',
        'total_questions' => 'required|numeric',
        'passing_score' => 'required|numeric|less_than_equal_to[100]'
    ];
}
