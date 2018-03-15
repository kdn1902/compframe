<?php
namespace App\Controllers;

use \Illuminate\Database\Capsule\Manager as Capsule;

class MainController extends \Core\Controller
{
	public function index()
	{
	    $posts = Capsule::table('posts')->get();
		$posts2 = \App\Models\Post::all();
		echo $this->blade->render("index", ["message" => "Its message", "posts" => $posts2]);
	}

}