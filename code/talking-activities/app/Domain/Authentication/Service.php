<?php
namespace App\Domain\Authentication;

use App\Domain\Authentication\Repository;
use App\Domain\Authentication\Credentials;
use App\Domain\Authentication\MessageManager;
use App\Domain\Authentication\TokenGenerator;
use App\Domain\Authentication\User;


class Service
{
	private $repository;
	private $tokenGenerator;

	public function __construct(Repository $repository, TokenGenerator $tokenGenerator)
    {
        $this->repository = $repository;
		$this->tokenGenerator = $tokenGenerator;
	}
    
	public function attempt(Credentials $credentials)
	{
		$user = $this->repository->find($credentials);
		$user->setToken($this->generateToken($user));
		$message = MessageManager::compose($user);
        return $message;
	}
	
	private function generateToken(User $user)
	{
		return $this->tokenGenerator->do($user);
	}
}
