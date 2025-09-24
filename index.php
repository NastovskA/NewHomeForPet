<?php
// index.php (Front Controller)

define('BASE_PATH', __DIR__);

require_once 'config/database.php';
require_once 'config/paths.php';

require_once 'controllers/HomeController.php';
require_once 'controllers/PetController.php';
require_once 'controllers/FactController.php';
require_once 'controllers/AboutController.php';
require_once 'controllers/ContactController.php';
require_once 'controllers/MeetController.php';
require_once 'controllers/GiveController.php';

$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'home/index';
$urlParts = explode('/', $url);

$controllerName = ucfirst($urlParts[0]) . 'Controller';
$actionName = isset($urlParts[1]) ? $urlParts[1] : 'index';

$params = array_slice($urlParts, 2);

if (class_exists($controllerName)) {
    $controller = new $controllerName();
    
    if (method_exists($controller, $actionName)) {
        call_user_func_array([$controller, $actionName], $params);
    } else {
        http_response_code(404);
        require_once 'views/errors/404.php';
    }
} else {
    http_response_code(404);
    require_once 'views/errors/404.php';
}