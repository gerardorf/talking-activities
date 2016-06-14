<?php 
namespace Tests\System;

use Tests\TestCase;

class LoginTest extends TestCase
{
	/** @test */
	public function it_authenticates_a_user()
	{
		$aUser = ['email' => 'student1@pruebas.com','password' => '1234/Alemany'];
		$this->json('POST','system/authentication',$aUser)
			->assertResponseOk()
			->seeJsonEquals([
				"token" => "1234"
			]); 	
	}
}