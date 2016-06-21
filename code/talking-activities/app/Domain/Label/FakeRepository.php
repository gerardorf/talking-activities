<?php
namespace App\Domain\Label;

use App\Domain\Label\Label;
use App\Domain\Label\Repository;

class FakeRepository implements Repository
{
    private static $labels = [
        'login.mail.label' => 'Correo electrónico',
        'login.password.label' => 'Contraseña'
    ];

    public function find($key)
    {
        $value = self::$labels[$key];
        return new Label($key, $value);
    }
}