<?php

use Illuminate\Container\Container;
use duncan3dc\Laravel\BladeInstance;
use Illuminate\Database\Capsule\Manager as Capsule;

require __DIR__.'/../vendor/autoload.php';

session_start();
$container = new Container();


$routes = require_once("../config/route.php");

$container->bind('BladeInstance', function () {
	return new BladeInstance("../App/Views/", "../App/Views/cache/");
});

$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'larackeditor',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();


$route = $container->makeWith(\Core\Router::class, [ "container" => $container, "routes" => $routes ]);
$route->run();

