<?php
namespace App\Domain\Authentication;

use App\Domain\Authentication\Repository;

class Service
{

	public function attempt($email, $password)
	{
		$isStored  = Repository::exists($email,$password);
		if( !$isStored ) return false;

		return ['token' => '1234'];
	}
}