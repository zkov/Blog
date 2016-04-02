<?php
require_once __DIR__ . '/../html/message.html';

abstract class IPage
{
	abstract public function printHtml();
	
	public function message($string)
	{
		$dom = new DOMDocument();
		$dom->loadHtmlFile("/../html/message.html");
		$message_parag = $dom->getElementById('message-paragraph');
		$message_parag->value = $string;
		$html = $dom->saveHTML();
		return $html;
	}
}
