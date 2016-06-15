<?php
namespace App\Domain\Label;

use App\Domain\Label\Repository as LabelRepository;

class Service
{
    public static function resolve($key)
    {
        $value = LabelRepository::find($key);
        $message = ['key' => $key, 'value' => $value];
        return response()->json($message);
    }
}