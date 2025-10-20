<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'StudentController::index');
$routes->resource('students', ['controller' => 'StudentController']);
$routes->get('add-student', 'PageController::addStudentForm');
$routes->get('api-tester', 'TesterController::index');

