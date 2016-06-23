<?php
namespace App\Domain\Authentication;

class MessageManager
{
    public static function tokenMessage($token)
    {
        $message['token'] = $token;
        return $message;
    }
    
    public static function errorMessage()
    {
        $message['error'] = 'login.password.error';
        return $message;
    }
}