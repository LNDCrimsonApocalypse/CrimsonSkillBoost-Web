<?php

namespace App\Models;
use CodeIgniter\Model;

class LessonModel extends Model
{
    protected $table = 'lessons';
    protected $primaryKey = 'id';

    // These fields can be set or updated using save(), insert(), or update()
    protected $allowedFields = [
        'title',
        'description',
        'content',
        'created_at',
        'course_id'
    ];

    // Optional: Use timestamps if you want created_at/updated_at to auto-update
    protected $useTimestamps = false; // Set to true only if 'created_at'/'updated_at' are managed automatically
}
