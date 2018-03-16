<?php
namespace Core;
use \Illuminate\Database\Capsule\Manager as Capsule;

class Database 
{
	public function __construct()
	{
		$capsule = new Capsule;
		$capsule->addConnection(require_once("../config/database.php"));
		$capsule->setAsGlobal();
		$capsule->bootEloquent();
	}
}