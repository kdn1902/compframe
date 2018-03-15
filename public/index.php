<?php

use Illuminate\Container\Container;
use duncan3dc\Laravel\BladeInstance;

require __DIR__.'/../vendor/autoload.php';

$container = new Container();


$routes = require_once("../config/route.php");

$container->bind('BladeInstance', function () {
	return new BladeInstance("../views/", "../views/cache/");
});

$route = $container->makeWith(\Core\Router::class, [ "container" => $container, "routes" => $routes ]);
$route->run();

