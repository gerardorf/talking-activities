<?php
namespace App\Domain\Authentication;

use App\Domain\Authentication\Repository;
use App\Domain\Authentication\User;

class Service
{
	public function attempt(User $user)
	{
		$isStored = Repository::exists($user);
		$token = TokenManager::create($user, $isStored);
		return MessageManager::compose($token);
	}
}
