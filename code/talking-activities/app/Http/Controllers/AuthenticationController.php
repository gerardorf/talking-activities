<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain\Authentication\Service as AuthenticationService;
use App\Domain\Authentication\Credentials;

class AuthenticationController extends Controller
{

    private $authenticationService;

	public function __construct(AuthenticationService $service)
	{
        $this->authenticationService = $service;
	}

	public function attempt(Request $request)
	{
        $credentials = new Credentials($request->email, $request->password);
        $token = $this->authenticationService->attempt($credentials);
		return response()->json($token);
	}
}