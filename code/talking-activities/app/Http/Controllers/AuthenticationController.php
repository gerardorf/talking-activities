<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain\Authentication\Service as AuthenticationService;

class AuthenticationController extends Controller
{

    private $service;

	public function __construct(AuthenticationService $service)
	{
        $this->service = $service;
	}

	public function attempt(Request $request)
	{
        $email = $request->email;
        $password = $request->password;

        $token = $this->service->attempt($email, $password);

		return response()->json($token);
	}
}