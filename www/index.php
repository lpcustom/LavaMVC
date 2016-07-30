<?php

session_start();

define("DOCUMENT_ROOT", __DIR__);
define("ROOT", dirname(__DIR__));

$loader = require ROOT . '/vendor/autoload.php';

$get = LavaMVC\Registries\Get::getInstance();

$params = explode("/", $get->_params);


$controller = isset($params[0]) ? $params[0] : null;
$action     = isset($params[1]) ? $params[1] : null;

$routes = json_decode(file_get_contents(ROOT . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . "routes.json"));


$cname = 'App\Controllers\Home';
$aname = 'index';

if(isset($routes->$controller)) {
    $cname = $routes->$controller->controller;
    $methods = get_class_methods($cname);
    if(isset($routes->$controller->action->$action)) {
        $aname = $routes->$controller->action->$action;
    } else if(in_array($action, $methods)) {
        $aname = $action;
    } else {
        $aname = 'index';
    }
}

$c = new $cname();
$c->$aname();
