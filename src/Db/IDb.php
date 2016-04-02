<?php

interface IDb
{
	public function getUserInfo($user);
	public function insertUser($user, $password, $email, $role = 'author');
}
