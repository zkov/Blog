<?php

class ArticleEditor
{
	private $editor;

	public function __construct()
	{

	}

	public function loadEditor()
	{
		$html = file_get_contents("../html/article-edit.html");
		echo $html;
	}
}
