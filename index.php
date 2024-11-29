<?php
require_once 'config.php';
define('ROOT_DIR', dirname(__FILE__));

// Membuat instance dari Database
$database = new Database();
$db = $database->getConnection(); // Mendapatkan koneksi database

// Improved autoloader for both Controllers and Models
function autoload($className) {
    // Check if class is a Controller
    $controllerFile = ROOT_DIR . "/controllers/{$className}.php";
    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        return;
    }
    
    // Check if class is a Model
    $modelFile = ROOT_DIR . "/models/{$className}.php";
    if (file_exists($modelFile)) {
        require_once $modelFile;
        return;
    }
}
spl_autoload_register('autoload');

// Get controller and action from URL
$controller = isset($_GET['c']) ? $_GET['c'] : 'Auth';
$action = isset($_GET['a']) ? $_GET['a'] : 'index';
$controllerClass = $controller . 'Controller';

try {
    if (!class_exists($controllerClass)) {
        throw new Exception("Controller not found: $controllerClass");
    }
    $controllerInstance = new $controllerClass();
    if (!method_exists($controllerInstance, $action)) {
        throw new Exception("Action not found: $action");
    }
    $controllerInstance->$action();
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}

    