<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;

class HomeTest extends TestCase
{
    public function testShowsWelcomeMessage()
    {
        $this->visit('/')
             ->see('Laravel 5');
    }
}
