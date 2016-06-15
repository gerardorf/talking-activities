<?php
namespace App\Domain\Authentication;

class TokenManager
{

    public static function create($user, $approval)
    {
        $token =  self::createToken($user, $approval);
        return self::composeMessage($token);
    }

    private static function createToken($user, $approval)
    {
        if ( !$approval ) return '';
        return TokenGenerator::do($user);
    }

    private static function composeMessage($token)
    {
        return ['token' => $token];
    }
}