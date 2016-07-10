<?php

namespace App\Domain\Authentication;

class Credentials
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

	public function id()
	{
		return md5($this->email().$this->password());
	}
}