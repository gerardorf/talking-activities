<?php
namespace App\Domain\Label;

interface Repository
{
    public function find($key);
}