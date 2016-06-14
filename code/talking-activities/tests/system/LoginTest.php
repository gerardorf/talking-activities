<?php 
namespace Tests\System;

use Tests\TestCase;

class LoginTest extends TestCase
{

	/** @test */
	public function it_authenticates_a_user()
	{
		$aUser = ['email' => 'student1@pruebas.com','password' => '1234/Alemany'];
		$endpoint = 'system/authentication';
		$validToken = ["token" => "1234"];

		$this->json('POST',$endpoint,$aUser)
			->assertResponseOk()
			->seeJsonEquals($validToken); 	
	}

}