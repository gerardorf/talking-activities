<?php
namespace App\Domain\Authentication;

use App\Domain\Authentication\User;

class NullUser extends User
{

    public function __construct()
    {
    }
    
    public function isValid()
    {
        false;
    }

    public function token()
    {
        return '';
    }}