<?php

require_once 'IPage.php';
/**
 * Blog Class starts the blog
 */
class Blog implements IPage
{

	function __construct()
	{

	}

	public function printHtml()
	{
		return $html = file_get_contents(__DIR__ . "/../html/index.html");
	}
}
