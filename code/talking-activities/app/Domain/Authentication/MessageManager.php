<?php
namespace App\Domain\Authentication;

class MessageManager
{
    public static function compose(User $user)
    {
        $message = self::appendToken($user);
        $message = self::addErrorsIfNeeded($user, $message);
        return $message;
    }

    private static function appendToken(User $user)
    {
        $message = ['token' => $user->token()];
        return $message;
    }
    
    private static function addErrorsIfNeeded(User $user, $message)
    {
        if (!$user->isValid()) {
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