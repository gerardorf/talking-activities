<?php
namespace App\Domain\Label;

use App\Domain\Label\FakeRepository as LabelRepository;

class Service
{
    private $repository;

    public function __construct()
    {
        $this->repository = new LabelRepository();
    }

    public function resolve($key)
    {
        $label = $this->repository->find($key);
        return $label;
    }
}