<?php
namespace App\Domain\Authentication;

interface TokenGenerator
{
    public function do(User $user);
}