<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Optional: Default route (redirect to login)
$routes->get('/', 'Auth::initial');

// Manual route definitions
$routes->get('/login', 'Auth::login');
$routes->get('/register', 'Auth::register');
$routes->get('/verify_code', 'Auth::verifyCodeInput');
$routes->get('/setup_profile', 'Auth::setupProfile');
$routes->get('/profile', 'Auth::profile');
$routes->get('/homepage', 'Auth::homepage');
$routes->get('/dashboard', 'Auth::dashboard');
$routes->post('/auth/verify', 'Auth::verify');
$routes->post('profile/save', 'Profile::save');
$routes->post('profile/save', 'Auth::saveProfile');
$routes->get('lessons-dashboard', 'LessonsController::index');
$routes->get('lesson/(:num)', 'Lesson::view/$1'); // For viewing a single lesson
$routes->get('lessons', 'Lesson::index'); // Optional: full lessons list
$routes->get('/auth/get-courses', 'Auth::getCourses');
$routes->post('/auth/upload-lesson', 'Auth::uploadLesson');
$routes->post('/grades/calculate', 'Auth::calculateGrade'); // or 'GradesController::calculateGrade'
$routes->get('/test/upload_lessons', 'TestPages::uploadLesson');
$routes->get('/test/calculate_grade', 'TestPages::calculateGrade');
$routes->get('/course', 'Course::index');
$routes->get('/course/edit/(:num)', 'Course::edit/$1');
$routes->post('/course/update/(:num)', 'Course::update/$1');
$routes->post('/course/delete/(:num)', 'Course::delete/$1');
$routes->get('terms', 'Auth::terms');
$routes->get('topics', to: 'Auth::topics');
$routes->get(from: 'aboutus', to: 'Auth::aboutus');
$routes->get(from: 'loggedin', to: 'Auth::loggedin');




// Enable auto routing (optional but helpful during development)
$routes->setAutoRoute(true);
