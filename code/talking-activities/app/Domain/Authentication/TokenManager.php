<?php
namespace App\Domain\Authentication;

class TokenManager
{

    public static function create($user)
    {
        return TokenGenerator::do($user);
    }

}