<?php

session_start();

use core\Router;

function allClasses($class) {
    $file = '../' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}
spl_autoload_register('allClasses');

// Main Config
require_once 'config.php';
define('START_PAGE', '/');

// URI
$uri = $_SERVER['REQUEST_URI'];


// Routes
$routes[''] = ['controller' => 'main', 'action' => 'recordsList'];
$routes['add'] = ['controller' => 'add', 'action' => 'addRecord'];


// Get Route
Router::getRoute($uri, $routes);
