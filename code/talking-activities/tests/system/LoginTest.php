<?php 
namespace Tests\System;

use Tests\TestCase;

class LoginTest extends TestCase
{
    const ENDPOINT= 'system/authentication';
    

    /** @test */
	public function it_authenticates_a_valid_user()
	{
        $validUser = ['email' => 'student1@pruebas.com', 'password' => '1234/Alemany'];

        $this->logWith($validUser)
            ->assertValidToken();
	}

	/** @test */
	public function it_rejects_an_invalid_user()
	{
		$invalidUser = ['email' => 'idontexist@pruebas.com', 'password' => 'whatever'];

		$this->logWith($invalidUser)
            ->assertErrorMessage();
        
	}

    private function logWith($user)
    {
        return $this->json('POST', self::ENDPOINT, $user);
    }
    
    private function assertValidToken()
    {
        $validToken = ["token" => "1234"];
        
        $this->assertResponseOk()
            ->seeJsonEquals($validToken);
    }
    
    private function assertErrorMessage()
    {
        $errorMessage = ['token' => '', 'error'=> 'login.password.error'];
        
        return $this->assertResponseOk()
            ->seeJsonEquals($errorMessage);
    }

}