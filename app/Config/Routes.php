<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ✅ Default route: load index.html from public folder
$routes->get('/', function() {
    return redirect()->to(base_url('index.html'));
});

// ✅ API resource routes
$routes->resource('students', ['controller' => 'StudentController']);

// ✅ Optional pages or extra routes
$routes->get('add-student', 'PageController::addStudentForm');
$routes->get('api-tester', 'TesterController::index');
