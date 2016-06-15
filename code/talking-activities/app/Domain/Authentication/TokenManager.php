<?php
namespace App\Domain\Authentication;

class TokenManager
{

    public static function create($user, $approval)
    {
        return self::createToken($user, $approval);
    }

    private static function createToken($user, $approval)
    {
        if ( !$approval ) return '';
        return TokenGenerator::do($user);
    }

}