<?php

namespace App\Controllers;

class Lesson extends BaseController
{
    public function view($id)
    {
        // Dummy lesson data
        $lesson = [
            'id' => $id,
            'title' => 'Sample Lesson',
            'course_id' => 1,
            'created_at' => '2024-06-01',
            'description' => 'This is a sample lesson description.',
            'content' => 'Lesson content goes here.'
        ];

        return view('lesson_view', ['lesson' => $lesson]);
    }

    public function index()
    {
        // Dummy lessons list
        $lessons = [
            [
                'id' => 1,
                'title' => 'Sample Lesson 1',
                'course_id' => 1,
                'created_at' => '2024-06-01',
                'description' => 'Sample description 1',
                'content' => 'Content 1'
            ],
            [
                'id' => 2,
                'title' => 'Sample Lesson 2',
                'course_id' => 2,
                'created_at' => '2024-06-02',
                'description' => 'Sample description 2',
                'content' => 'Content 2'
            ]
        ];
        return view('lesson_list', ['lessons' => $lessons]);
    }
}
