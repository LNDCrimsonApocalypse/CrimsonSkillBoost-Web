<?php

namespace App\Controllers;

class LessonsController extends BaseController
{
    public function index()
    {
        // Dummy lessons data
        $data['lessons'] = [
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

        // Debug step: check if data exists
        // dd($data['lessons']);

        return view('dashboard', $data);
    }
}
