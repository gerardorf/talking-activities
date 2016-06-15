<?php
namespace Tests\System;

use Tests\TestCase;

class LabelTest extends TestCase
{
    /** @test */
    public function it_resolves_login_keys()
    {
        $this->json('POST','/system/labels',['key'=>'login.mail.label'])
            ->assertResponseOk()
            ->seeJsonEquals(['key'=>'login.mail.label', 'value'=>'Correo electrónico']);

        $this->json('POST','/system/labels',['key'=>'login.password.label'])
            ->assertResponseOk()
            ->seeJsonEquals(['key'=>'login.password.label', 'value'=>'Contraseña']);
    }
}