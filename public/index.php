<?php
use Illuminate\Container\Container;
use duncan3dc\Laravel\BladeInstance;

require __DIR__.'/../vendor/autoload.php';

//session_start();
$container = new Container();

$routes = require_once("../config/route.php");

$container->singleton('BladeInstance', function () {
	return new BladeInstance("../App/Views/", "../App/Views/cache/");
});

$container->make(\Core\Database::class);

$route = $container->makeWith(\Core\Router::class, [ "container" => $container, "routes" => $routes ]);
$route->run();

