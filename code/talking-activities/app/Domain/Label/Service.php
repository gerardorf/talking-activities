<?php
namespace App\Domain\Label;

use App\Domain\Label\Repository;

class Service
{
    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function resolve($key)
    {
        $label = $this->repository->find($key);
        return $label;
    }
}