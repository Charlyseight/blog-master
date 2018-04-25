<?php

session_start();
$routes = include 'configs/routes.php';

$routePart = explode('/', $routes['default']);

$action = $routePart[1];

$ressource = $routePart[2];

$method = $_SERVER['REQUEST_METHOD'];

$a = $_REQUEST['a'] ?? $action;

$r = $_REQUEST['r'] ?? $ressource;
if (!in_array($method . '/' . $a . '/' . $r, $routes)) {
    die('Vous ne pouvez pas ');
}

$controllerFile = $r . 'Controller.php';
require('controllers/' . $controllerFile);


$data = call_user_func($a);

