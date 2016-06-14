<?php 
namespace App\Domain\Authentication;

class Repository
{
	public static function exists($email, $password)
	{
		$stored = ['email' => 'student1@pruebas.com','password' => '1234/Alemany'];
		
		return $stored['email'] == $email && $stored['password'] == $password;
	}
}