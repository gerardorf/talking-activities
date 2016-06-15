<?php
namespace App\Domain\Authentication;

use App\Domain\Authentication\Repository;
use App\Domain\Authentication\User;

class Service
{

	public function attempt(User $user)
	{
		$isStored = Repository::exists($user);
		return TokenManager::create($user, $isStored);

	}
}
