<?php
// ==========================================
// CodeIgniter Front Controller (index.php)
// Location: C:\xampp\htdocs\backend\student_api_ci\public
// ==========================================

// Show all errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Force development mode
define('CI_ENVIRONMENT', 'development');

use CodeIgniter\Boot;
use Config\Paths;

/*
 * ---------------------------------------------------------------
 * CHECK PHP VERSION
 * ---------------------------------------------------------------
 */
$minPhpVersion = '8.1'; // Minimum PHP version for CodeIgniter 4.6.x
if (version_compare(PHP_VERSION, $minPhpVersion, '<')) {
    $message = sprintf(
        'Your PHP version must be %s or higher to run CodeIgniter. Current version: %s',
        $minPhpVersion,
        PHP_VERSION
    );

    header('HTTP/1.1 503 Service Unavailable.', true, 503);
    echo $message;
    exit(1);
}

/*
 * ---------------------------------------------------------------
 * SET THE CURRENT DIRECTORY
 * ---------------------------------------------------------------
 */

// Path to the front controller (this file)
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Ensure the current directory points to the front controller’s directory
if (getcwd() . DIRECTORY_SEPARATOR !== FCPATH) {
    chdir(FCPATH);
}

/*
 * ---------------------------------------------------------------
 * BOOTSTRAP THE APPLICATION
 * ---------------------------------------------------------------
 * Loads and registers autoloaders, constants, and environment bootstraps.
 */

// LOAD OUR PATHS CONFIG FILE
// Adjust this path if your app folder is not one level above public/
require FCPATH . '../app/Config/Paths.php';

$paths = new Paths();

// LOAD THE FRAMEWORK BOOTSTRAP FILE
require $paths->systemDirectory . '/Boot.php';

// RUN THE APPLICATION
exit(Boot::bootWeb($paths));
