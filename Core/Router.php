<?php

namespace Core;
class Router{
	
	private $dispatcher;
	
	public function __construct($routes)
	{
		$this->dispatcher = \FastRoute\simpleDispatcher($routes);
	}
	
	public function run()
	{
		$httpMethod = $_SERVER['REQUEST_METHOD'];
		$uri = $_SERVER['REQUEST_URI'];

		// Strip query string (?foo=bar) and decode URI
		if (false !== $pos = strpos($uri, '?')) {
		$uri = substr($uri, 0, $pos);
		}
		$uri = rawurldecode($uri);

		$routeInfo = $this->dispatcher->dispatch($httpMethod, $uri);
		switch ($routeInfo[0]) {
			case \FastRoute\Dispatcher::NOT_FOUND:
				echo "404 Not Found";
			break;
			case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
				$allowedMethods = $routeInfo[1];
				echo "405 Method Not Allowed";
			break;
			case \FastRoute\Dispatcher::FOUND:
				$handler = $routeInfo[1];
				$vars = $routeInfo[2];
				list($class, $method) = explode('/',$handler,2);
				$controller = app()->make('\App\Controllers\\'. $class);
				$controller->{$method}(...array_values($vars));
				
			break;
		}
	}
}
