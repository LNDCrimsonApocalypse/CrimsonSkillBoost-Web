<?php
namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'title', 
        'description', 
        'file_path',
        'year',
        'section',
        'semester',
        'courses',
        'start_date',
        'end_date',
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
        'semester' => 'required|in_list[1,2,3]'
    ];
}
