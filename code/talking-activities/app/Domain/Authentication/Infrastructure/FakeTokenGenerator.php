<?php
namespace App\Domain\Authentication\Infrastructure;

use App\Domain\Authentication\TokenGenerator;
use App\Domain\Authentication\User;

class FakeTokenGenerator implements TokenGenerator
{
	public function do(User $user)
	{
		return '1234';
	}
}