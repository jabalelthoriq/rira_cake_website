    <?php
    require_once 'config.php';
    define('ROOT_DIR', dirname(__FILE__));
    
    // Autoload class
    function autoloadController($className) {
        $controllerFile = ROOT_DIR . "/controllers/{$className}.php";
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
        }
    }
    spl_autoload_register('autoloadController');

    // Get controller and action from URL
    $controller = isset($_GET['c']) ? $_GET['c'] : 'Auth';
    $action = isset($_GET['a']) ? $_GET['a'] : 'index';

    // Format controller class name
    $controllerClass = $controller . 'Controller';

    // Create controller instance and call action
    $controllerInstance = new $controllerClass();
    $controllerInstance->$action();