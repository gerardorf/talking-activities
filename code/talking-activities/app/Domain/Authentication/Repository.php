<?php 
namespace App\Domain\Authentication;
use App\Domain\Authentication\User;


class Repository
{
	public static function exists(User $user)
	{

		$stored = ['email' => 'student1@pruebas.com','password' => '1234/Alemany'];
		
		return $stored['email'] == $user->email() && $stored['password'] == $user->password();
	}
}