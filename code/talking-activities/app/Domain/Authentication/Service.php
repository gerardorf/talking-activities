<?php
namespace App\Domain\Authentication;

use App\Domain\Authentication\Repository;
use App\Domain\Authentication\Credentials;

class Service
{
	private $repository;

    public function __construct()
    {
        $this->repository = new Repository();
    }
    
	public function attempt(Credentials $credentials)
	{
		$user = $this->repository->exists($credentials);
		$message = MessageManager::compose($user);
        return $message;
	}
}
