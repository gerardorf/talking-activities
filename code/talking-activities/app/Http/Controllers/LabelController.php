<?php

namespace App\Http\Controllers;

use App\Domain\Label\Service as LabelService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LabelController extends Controller
{

    private $service;

    public function __construct(LabelService $labelService)
    {
        $this->service = $labelService;
    }
    public function resolve(Request $request)
    {
        $key = $request->key;
        $label = $this->service->resolve($key);
        return response()->json($label);
    }
}