<?php

DEFINE('DEMOPREFIX','/demos/demo11');

use FastRoute\RouteCollector;

$container = require __DIR__ . '/app/bootstrap.php';

$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) 
{
	$r->addRoute('GET', DEMOPREFIX . '/', 'Simulation\Controller\HomeController');
	$r->addRoute('GET', DEMOPREFIX . '/simulate', 'Simulation\Controller\SimulateController');
});

$route = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

switch ($route[0]) 
{
    case FastRoute\Dispatcher::NOT_FOUND:
        echo '404 Not Found';
    break;
    
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        echo '405 Method Not Allowed';
    break;
    
    case FastRoute\Dispatcher::FOUND:
        $controller = $route[1];
        $parameters = $route[2];
        $container->call($controller, $parameters);
    break;
}