<?php
namespace Tests\Applicative;

use Tests\TestCase;

class LoginTest extends TestCase
{
    /** @test */
    public function it_shows_login_page()
    {
        $this->visit('/login')
            ->see('Login')
            ->see('Correo electrónico')
            ->see('Contraseña')
            ->see('Entrar');
    }
}
