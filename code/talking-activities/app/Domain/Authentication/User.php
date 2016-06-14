<?php

namespace App\Domain\Authentication;

class User
{
	private $email;
	private $password;
	
	public function __construct($email, $password)
	{
		$this->email = $email;
		$this->password = $password;
	}

	public function email()
	{
		return $this->email;
	}

	public function password()
	{
		return $this->password;
	}
}