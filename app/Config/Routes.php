<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'StudentController::index');

// ✅ RESTful routes
$routes->resource('students', ['controller' => 'StudentController']);

// ✅ Handle CORS preflight OPTIONS requests globally
$routes->options('(:any)', function() {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
    header('Access-Control-Allow-Credentials: true');
    http_response_code(200);
    exit;
});

// Optional UI routes (if you added any)
$routes->get('add-student', 'PageController::addStudentForm');
$routes->get('api-tester', 'TesterController::index');
