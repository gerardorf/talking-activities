<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain\Authentication\Service as AuthenticationService;
use App\Domain\Authentication\User;

class AuthenticationController extends Controller
{

    private $service;

	public function __construct(AuthenticationService $service)
	{
        $this->service = $service;
	}

	public function attempt(Request $request)
	{

        $user = new User($request->email, $request->password);

        $token = $this->service->attempt($user);

		return response()->json($token);
	}
}