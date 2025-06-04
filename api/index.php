<?php
// Path to the front controller (this file)
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Location of the project root
$rootPath = dirname(__DIR__);

// Path to the public directory (for compatibility)
$_SERVER['DOCUMENT_ROOT'] = $rootPath . '/public';

// Load the CodeIgniter bootstrap file
require $rootPath . '/public/index.php';
