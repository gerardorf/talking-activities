<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 6/21/16
 * Time: 4:58 PM
 */

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