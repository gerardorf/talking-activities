<?php
namespace App\Domain\Authentication;

use App\Domain\Authentication\Repository;
use App\Domain\Authentication\User;

class Service
{
	private $repository;

    public function __construct()
    {
        $this->repository = new Repository();
    }
    
	public function attempt(User $user)
	{
		$isStored = $this->repository->exists($user);
		$token = TokenManager::create($user, $isStored);
		return MessageManager::compose($token);
	}
}
