<?php
namespace App\Domain\Authentication;

use App\Domain\Authentication\Repository;
use App\Domain\Authentication\Credentials;
use App\Domain\Authentication\MessageManager;

class Service
{
	private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }
    
	public function attempt(Credentials $credentials)
	{
		$user = $this->repository->exists($credentials);
		$message = MessageManager::compose($user);
        return $message;
	}
}
