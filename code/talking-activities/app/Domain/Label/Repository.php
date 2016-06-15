<?php
namespace App\Domain\Label;

class Repository
{
    private static $labels = [
        'login.mail.label' => 'Correo electrónico',
        'login.password.label' => 'Contraseña'
    ];

    public static function find($key)
    {
        return self::$labels[$key];
    }
}