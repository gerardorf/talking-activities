<?php
namespace App\Domain\Authentication;

use App\Domain\Authentication\Credentials;
use App\Domain\Authentication\User;
use App\Domain\Authentication\NullUser;

class Repository
{
    private $stored = [];

    public function __construct()
    {
        array_push($this->stored, 
            new Credentials('student1@pruebas.com', '1234/Alemany'), 
            new Credentials('student2@pruebas.com', 'Ce-Sar-In-Pi'),
            new Credentials('student3@pruebas.com', 'soy.islandes_123*'),
            new Credentials('student4@pruebas.com', '1980_Ç-8'));
    }

    public function find(Credentials $credentials)
    {
        $found = in_array($credentials, $this->stored);
        if (!$found) return new NullUser();
        return new User($credentials);
	}
}