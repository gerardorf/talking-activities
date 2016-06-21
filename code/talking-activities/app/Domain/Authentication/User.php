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
        $this->token = TokenManager::create($credentials);
    }
    
    public function isValid()
    {
        return true;
    }

    public function token()
    {
        return $this->token;
    }
}