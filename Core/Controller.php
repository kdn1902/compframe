<?php
namespace Core;

class Controller{
	
	protected $container;
	protected $blade;
	
	public function __construct($container)
	{
		$this->container = $container;
		$this->blade = $this->container->make('BladeInstance');
	}
	
}