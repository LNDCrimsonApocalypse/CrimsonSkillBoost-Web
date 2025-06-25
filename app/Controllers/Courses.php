<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Course extends BaseController
{
    public function info($slug)
    {
        // Mock example — fetch actual course by slug from DB or Firebase
        $courses = [
            'oop' => [
                'title' => 'Object Oriented Programming',
                'students' => 1050,
                'description' => 'This course teaches OOP concepts...',
                'overview' => 'You will learn about classes, objects...',
                'topics' => ['Classes and Objects', 'Inheritance', 'Encapsulation'],
                'requirements' => ['Basic Programming', 'Logic Thinking'],
            ]
        ];

        if (!isset($courses[$slug])) {
            return redirect()->to('/allcourses'); // Or show 404
        }

        $data['course'] = $courses[$slug];

        return view('course_descrip', $data);
    }
}
