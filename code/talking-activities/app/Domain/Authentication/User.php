<?php
namespace App\Domain\Authentication;

use App\Domain\Authentication\Credentials;

class User
{
    private $username;
    private $token;

    public function __construct(Credentials $credentials)
    {
        $this->username = $credentials->email();
    }
    
    public function isValid()
    {
        return true;
    }

    public function token()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function username()
    {
        return $this->username;
    }
}