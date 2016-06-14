<?php
namespace App\Domain\Authentication;

class TokenCalculator
{
	public static function do(User $user)
	{
		return ['token' => '1234'];
	}
}