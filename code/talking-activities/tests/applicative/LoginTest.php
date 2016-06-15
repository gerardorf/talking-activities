<?php
namespace Tests\Applicative;

use Tests\TestCase;

class LoginTest extends TestCase
{
    /** test */
    public function a_valid_user_can_access()
    {
        $this->visit('/login');
        $this->see('Login')
            ->see('Correo electrónico')
            ->see('Contraseña')
            ->see('Entrar');
        $this->type('student1@pruebas.com','login.mail')
            ->type('1234/Alemany','login.password')
            ->press('login.submit')
            ->seePageIs('/welcome');
    }

    /** test */
    public function it_handles_an_unauthenticated_user()
    {
        $this->visit('/login')
            ->see('Login')
            ->see('Correo electrónico')
            ->see('Contraseña')
            ->see('Entrar');
        $this->type('invalidEmail','login.mail')
            ->type('anyPassword','login.password')
            ->press('login.submit')
            ->see('login.password.error');
    }
}
