<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Optional: Default route (redirect to login)
$routes->get('/', 'Auth::login');

// Manual route definitions
$routes->get('/auth/login', 'Auth::login');
$routes->get('/auth/register', 'Auth::register');
$routes->get('/auth/verify_code', 'Auth::verifyCodeInput');
$routes->get('/auth/setup_profile', 'Auth::setupProfile');
$routes->post('/auth/verify', 'Auth::verify');


// Enable auto routing (optional but helpful during development)
$routes->setAutoRoute(true);
