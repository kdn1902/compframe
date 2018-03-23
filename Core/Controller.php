<?php
namespace Core;

class Controller{
	
	protected $blade;
	
	public function __construct()
	{
		$this->blade = app()->make('BladeInstance');
	}
	
}