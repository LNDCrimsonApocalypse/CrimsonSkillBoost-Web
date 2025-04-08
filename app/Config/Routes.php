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
$routes->post('/auth/verify', 'Auth::verify');
$routes->get('/register', 'Auth::register');


// Enable auto routing (optional but helpful during development)
$routes->setAutoRoute(true);
