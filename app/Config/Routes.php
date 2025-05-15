<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Optional: Default route (redirect to login)
$routes->get('/', 'Auth::login');

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



// Enable auto routing (optional but helpful during development)
$routes->setAutoRoute(true);
