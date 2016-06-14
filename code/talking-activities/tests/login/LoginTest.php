<?php

class LoginTest extends TestCase
{
    /** @test */
    public function it_shows_login_page()
    {
        $this->visit('/login')
            ->see('Correo electronico')
            ->see('Contrasena')
            ->see('Entrar');
    }
}
