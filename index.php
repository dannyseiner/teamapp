<?php
session_start();
// LOAD CONFIG
$config = parse_ini_file('app.ini');
// DISPLAY ERRORS FROM CONFIG SETTINGS
if ($config['mode'] == 'development') {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    error_reporting(0);
}

spl_autoload_register(function ($class_name) {
    if (file_exists('Model/' . $class_name . '.php')) {
        require_once 'Model/' . $class_name . '.php';
    } elseif (file_exists('Controller/' . $class_name . '.php')) {
        require_once 'Controller/' . $class_name . '.php';
    }
});

require_once 'Routes.php';
