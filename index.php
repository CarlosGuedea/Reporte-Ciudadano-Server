<?php

use Stripe\LoginLink;

require_once 'vendor/autoload.php';
require 'controllers/datosController.php';


$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute(['POST','GET'], '/datos', [datosController::class, 'index']);

    $r->addRoute(['POST'], '/datos-ingresar', [datosController::class, 'ingresar']);

    $r->addRoute(['POST','GET'], '/datos-mostrar', [datosController::class, 'mostrar']);


});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo 'Página no encontrada';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        echo 'Método no permitido';
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        call_user_func_array($handler, $vars);
        break;
}
