<?php
namespace Tests\System;

use Tests\TestCase;

class LabelTest extends TestCase
{
    const ENDPOINT = '/system/labels';

    /** @test */
    public function it_resolves_login_keys()
    {
        $mailKey = ['key' => 'login.mail.label'];
        $mailExpectedLabel = ['key'=>'login.mail.label', 'value'=>'Correo electrónico'];
        
        $this->request($mailKey)
            ->assertResolvedProperly($mailExpectedLabel);

        $passwordKey = ['key' => 'login.password.label'];
        $passwordExpectedLabel = ['key' => 'login.password.label', 'value' => 'Contraseña'];
        
        $this->request($passwordKey)
            ->assertResolvedProperly($passwordExpectedLabel);
    }

    private function request($aLabel)
    {
        return $this->json('POST', self::ENDPOINT, $aLabel);
    }

    private function assertResolvedProperly($expectedLabel)
    {
        $this->assertResponseOk()
            ->seeJsonEquals($expectedLabel);
        
    }
}