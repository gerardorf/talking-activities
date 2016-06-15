<?php

namespace App\Http\Controllers;

use App\Domain\Label\Service as LabelService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function resolve(Request $request)
    {
        $key = $request->key;
        return LabelService::resolve($key);
    }
}