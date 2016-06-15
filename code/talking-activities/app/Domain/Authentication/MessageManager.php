<?php

namespace App\Domain\Authentication;

class MessageManager
{
    public static function compose($token)
    {
        $message = ['token' => $token];
        if (!$token) {
            $message = self::addErrors($message);
        }
        return $message;
    }

    private static function addErrors($message)
    {
        $message['error'] = 'login.password.error';
        return $message;
    }
}