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
            ->assertJWTToken();
	}

	/** @test */
	public function it_rejects_an_invalid_user()
	{
		$invalidUser = ['email' => 'idontexist@pruebas.com', 'password' => 'whatever'];

		$this->logWith($invalidUser)
            ->assertErrorMessage();
        
	}

    /** @test */
    public function it_authenticates_a_bunch_of_valid_users()
    {
        $validUser[0] = ['email' => 'student2@pruebas.com', 'password' => 'Ce-Sar-In-Pi'];
        $validUser[1] = ['email' => 'student3@pruebas.com', 'password' => 'soy.islandes_123*'];
        $validUser[2] = ['email' => 'student4@pruebas.com', 'password' => '1980_Ç-8'];

        foreach ($validUser as $user){
            $this->logWith($user)
                ->assertJWTToken();
        }
    }

    private function logWith($user)
    {
        return $this->json('POST', self::ENDPOINT, $user);
    }
    
    private function assertJWTToken()
    {
        $validToken = ["token"];
        
        $this->assertResponseOk()
            ->seeJsonStructure($validToken)
            ->dontSeeJson(['error'=> 'login.password.error']);
    }
    
    private function assertErrorMessage()
    {
        $errorMessage = ['error'=> 'login.password.error'];
        
        return $this->assertResponseOk()
            ->seeJsonEquals($errorMessage);
    }

}