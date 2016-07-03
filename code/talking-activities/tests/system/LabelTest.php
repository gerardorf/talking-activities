<?php
namespace Tests\System;

use Tests\TestCase;

class LabelTest extends TestCase
{
    const ENDPOINT = '/system/labels';

    /** @test */
    public function it_resolves_login_keys()
    {
        $mailKey = ['keys' => ['login.mail.label']];
        $mailExpectedLabel = ['key' => 'login.mail.label', 'value' => 'Correo electrónico'];
        
        $this->request($mailKey)
            ->assertResolvedProperly($mailExpectedLabel);

        $passwordKey = ['keys' => ['login.password.label']];
        $passwordExpectedLabel = ['key' => 'login.password.label', 'value' => 'Contraseña'];
        
        $this->request($passwordKey)
            ->assertResolvedProperly($passwordExpectedLabel);
        
        $severalKeys = ['keys' => ['login.mail.label', 'login.password.label']];
        $severalExpectedLabels = ['key' => 'login.mail.label', 'value' => 'Correo electrónico'];
        
        $this->request($severalKeys)
            ->assertResolvedProperly($severalExpectedLabels);
    }

    private function request($labels)
    {
        return $this->json('POST', self::ENDPOINT, $labels);
    }

    private function assertResolvedProperly($expectedLabel)
    {
        $this->assertResponseOk()
            ->seeJsonContains($expectedLabel);
    }
}