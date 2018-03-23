<?php
namespace App\Controllers;

use \Illuminate\Database\Capsule\Manager as Capsule;
use \Sunra\PhpSimple\HtmlDomParser;

class MainController extends \Core\Controller
{
	public function index($page = 1)
	{
	    $posts = Capsule::table('posts')->orderBy('updated_at','desc')->get()->toArray();// во view $post->title
		$posts2 = \App\Models\Post::orderBy('updated_at','desc')->get()->toArray(); //во view $post["title"]
		$paginator = app()->makeWith(\Core\Paging::class, [ "totalItems" => count($posts), "currentPage" => $page ]); 	
		$showposts = array_slice($posts, ($page - 1) * $paginator->getitemsPerPage(), $paginator->getitemsPerPage());
		echo $this->blade->render("index", ["message" => "Компоненты без фреймворков", "posts" => $showposts, "paginator" => $paginator]);
	}
}