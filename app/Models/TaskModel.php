<?php
namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'description', 'start_date', 'end_date', 'allow_late', 'attempts', 'created_by', 'file_path'];
    protected $useTimestamps = true;
}
