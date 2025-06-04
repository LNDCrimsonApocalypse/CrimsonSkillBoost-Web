<?php
namespace App\Controllers;

class LessonView extends BaseController
{
    public function index($id = null)
    {
        // Replace this with your actual lesson fetching logic
        $lesson = [
            'title' => 'Sample Lesson',
            'course_id' => 1,
            'created_at' => '2024-06-01',
            'description' => 'This is a sample lesson description.',
            'content' => 'Lesson content goes here.'
        ];
        return view('lesson_view', ['lesson' => $lesson]);
    }
}