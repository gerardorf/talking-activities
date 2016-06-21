<?php
namespace App\Domain\Label;

use JsonSerializable;

class Label implements JsonSerializable
{

    private $key;
    private $value;

    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    function jsonSerialize()
    {
        return [
            'key' => $this->key,
            'value' => $this->value
        ];
    }
}