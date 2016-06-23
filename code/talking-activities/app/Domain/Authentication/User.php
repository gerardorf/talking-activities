<?php
namespace App\Domain\Authentication;

use App\Domain\Authentication\Credentials;

class User
{
    private $username;

    public function __construct(Credentials $credentials)
    {
        $this->username = $credentials->email();
    }
    
    public function isValid()
    {
        return true;
    }
    
    public function username()
    {
        return $this->username;
    }
}