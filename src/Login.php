<?php
require_once 'IPage.php';

class Login implements IPage
{
	private $user;
	private $pw;

	public function __construct()
	{
		if(isset($_POST['l_username']) || isset($_POST["l_password"]))
		{
			$this->user = $_POST['l_username'];
			$this->pw   = $_POST["l_password"];
		} else {
			header("Location: http://blog.local/");
			die()
		}


	}

	public function loadLoginPanel()
	{

	}

	//This function is called by the Router class
	public function printHtml()
	{
		return "";
	}
}
