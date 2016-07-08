<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain\Authentication\Service as AuthenticationService;
use App\Domain\Authentication\MessageManager;
use App\Domain\Authentication\Credentials;
use App\Domain\Authentication\Exceptions\InvalidUserException;

class AuthenticationController extends Controller
{
    private $authenticationService;

	const STATUS_OK = 200;
	const STATUS_UNAUTHORIZED = 401;

	public function __construct(AuthenticationService $service)
	{
        $this->authenticationService = $service;
	}

	public function attempt(Request $request)
	{
		$status = self::STATUS_OK;
		try{
			$credentials = new Credentials($request->email, $request->password);
			$token = $this->authenticationService->attempt($credentials);
			$message = MessageManager::tokenMessage($token);
		}catch (InvalidUserException $exception){
			$message = MessageManager::errorMessage();
			$status = self::STATUS_UNAUTHORIZED;
		}
		return response()->json($message, $status);

	}
}