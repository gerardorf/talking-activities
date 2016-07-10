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
        $this->save(new Credentials('student1@pruebas.com', '1234/Alemany'));
        $this->save(new Credentials('student2@pruebas.com', 'Ce-Sar-In-Pi'));
        $this->save(new Credentials('student3@pruebas.com', 'soy.islandes_123*'));
        $this->save(new Credentials('student4@pruebas.com', '1980_Ç-8'));
    }

    public function find(Credentials $credentials)
    {
        $found = array_key_exists($credentials->id(), $this->stored);
        if (!$found) return new NullUser;
        return new User($credentials);
	}

    private function save(Credentials $credentials)
    {
        $this->stored[$credentials->id()]=$credentials;
    }

}