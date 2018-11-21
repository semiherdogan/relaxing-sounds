<?php

namespace App\Http\Controllers;

use App\User;
use App\Webservice\ErrorCodes;
use App\Webservice\Response;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $loginParameters = $request->only('email', 'password');
        $userExists = User::validateForLogin($loginParameters);
        if (!$userExists) {
            return Response::fail(
                ErrorCodes::USERNAME_PASSWORD_INCORRECT,
                ErrorCodes::USERNAME_PASSWORD_INCORRECT_MESSAGE,
            );
        }
    }

    public function register(Request $request)
    {
        $registerData = $request->only('name', 'email', 'password');
        $canRegister = User::validateForRegister($registerData);
        if (!$canRegister) {
            return Response::fail(
                ErrorCodes::REGISTER_PARAMETER_INVALID,
                ErrorCodes::REGISTER_PARAMETER_INVALID_MESSAGE,
            );
        }
    }

    public function logout(Request $request)
    {
        //
    }
}
