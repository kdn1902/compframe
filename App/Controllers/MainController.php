<?php
namespace App\Controllers;

class MainController extends \Core\Controller
{
	public function index()
	{
		echo $this->blade->render("index", ["message" => "Its message"]);
	}
}