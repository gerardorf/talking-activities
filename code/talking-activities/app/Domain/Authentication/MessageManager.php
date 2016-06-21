<?php
namespace App\Domain\Authentication;

class MessageManager
{
    public static function compose(User $user)
    {
        $message = ['token' => $user->token()];
        if (!$user->isValid())
        {
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