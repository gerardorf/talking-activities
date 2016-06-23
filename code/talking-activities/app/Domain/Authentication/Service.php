<?php
namespace App\Domain\Authentication;

use App\Domain\Authentication\Repository;
use App\Domain\Authentication\Credentials;
use App\Domain\Authentication\Exceptions\InvalidUserException;
use App\Domain\Authentication\TokenGenerator;


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
		if( !$user->isValid())
			throw new InvalidUserException;

		return $this->tokenGenerator->do($user);
	}
}
