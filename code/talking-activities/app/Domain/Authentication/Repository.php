<?php
namespace App\Domain\Authentication;

use App\Domain\Authentication\User;

class Repository
{
    private $stored = [];

    public function __construct()
    {
        array_push($this->stored, 
            new User('student1@pruebas.com', '1234/Alemany'), 
            new User('student2@pruebas.com', 'Ce-Sar-In-Pi'),
            new User('student3@pruebas.com', 'soy.islandes_123*'),
            new User('student4@pruebas.com', '1980_Ç-8'));
    }

    public function exists(User $user)
    {
        return in_array($user, $this->stored);
	}
}