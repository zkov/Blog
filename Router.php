<?php

class Router
{
	const FILE_LOAD_ERROR = "File not readable!";

	private function  __construct()
	{

	}

	public static function init($routes)
	{
		$class = null;
		$router = new Router();
		$route = $router->getRoute();
		$file = $router->getFile($routes, $route);
		$class_name = ltrim(rtrim(strrchr($file, '/'),'.php'),'/');

		//Include the requested file and initialise the class
		$router->loadFile($file);
		$class = $router->callClass($class_name);
		$html = $class->printHtml();
		if( $html != null )
		{
			echo $html;
		}
	}

	private function getRoute()
	{
		if (isset($_SERVER["REQUEST_URI"]))
		{
			return $_SERVER["REQUEST_URI"];
		}
		return "/";
	}

	private function getFile( $routes, $route )
	{
		if( isset($routes[$route]) )
		{
			return $routes[$route];
		}
		return "Blog.php";
	}

	private function callClass($class_name)
	{
		return new $class_name;
	}

	private function loadFile($file)
	{
		$file_path = $file;
		if (is_readable($file_path)) {
			include($file_path);
		}else{
			return constant(Router::FILE_LOAD_ERROR);
		}

	}
}
