<?php

require_once 'IPage.php';
require_once __DIR__ . 'Db/IDb.php';
/**
 *
 */
class Registration implements IPage
{

	private $user;
	private $pw;
	private $email;
	private $role = 'author';
	private $db;

	function __construct(IDb $db)
	{
		if ( null !== $_POST['r_username'] && null !== $_POST['r_password'] && null !== $_POST['r_email'] ) {
			$this->user  = $_POST['r_username'];
			$this->pw    = $_POST['r_password'];
			$this->email = $_POST['r_email'];
			$this->db    = $db;
		}

		if ( null === $this->db->getUserInfo($this->user) )
		{
			$this->db->insertUser($this->user, $this->pw, $this->email, $this->role);
		} else {
			message('Username already taken!');
		}
	}

	public function message($message)
	{
		return $message;
	}

	public function printHtml()
	{
		return null;
	}
}
