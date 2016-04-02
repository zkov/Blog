<?php
require_once 'IDb.php';

class Db implements IDb
{
	private $db_user;
	private $db_password;
	private $db_host;
	private $db_name;
	private $link;

	public function __construct()
	{
		$this->db_user     = DB_USER;
		$this->db_password = DB_PASSWORD;
		$this->db_host     = DB_HOST;
		$this->db_name	   = DB_NAME;

		try {
			$this->link = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		} catch (mysqli_sql_exception $e) {
			die("Connection to <b>".DB_NAME."</b> database faild!!!");
		}
	}

	/**
 	 * returns from database user information
 	 *
 	 * @param user
 	 * @return array or null
	 */
	public function getUserInfo($user)
	{
		$user = $this->link->real_escape_string($user);
		$query = "SELECT * FROM users WHERE user_name = '{$user}'";

		if( $result = $this->link->query($query) ) {

			return $result->fetch_array();
		}
		return null;
	}

	/**
 	 * insert user inforamtions
 	 *
 	 * @param $user, $password, $email
 	 * @return bool
	 */

	public function insertUser($user, $password, $email, $role)
	{
		$user = $this->link->real_escape_string($user);
		$password = password_hash($this->link->real_escape_string($password), PASSWORD_DEFAULT);
		$email = $this->link->real_escape_string($email);
		try {
			$this->link->autocommit(FALSE);
			$this->link->begin_transaction("START TRANSACTION READ WRITE");
			$this->link->query("INSERT into users (user_name,password,email) VALUES ({$user},{$password},{$email})");
			$user_id = $this->link->insert_id();
			$this->link->query("INSERT into user_role (user_id,role_id) VALUES ({$user_id}, SELECT role_id FROM roles WHERE role_name = '{$role}')");
			$this->link->commit();
		} catch (Exception $e) {
			$this->link->rollback();
		}
	}


}
