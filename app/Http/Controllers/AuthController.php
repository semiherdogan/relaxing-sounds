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
        $loginParameters = $request->only(
            'appuid',
            'app_version',
            'language_version'
        );

        $userExists = User::validateForLogin($loginParameters);
        if (!$userExists) {
            return Response::fail(
                ErrorCodes::USER_NOT_FOUND,
                ErrorCodes::USER_NOT_FOUND_MESSAGE
            );
        }

        $user = User::where('appuid', $loginParameters['appuid'])->first();
        $token = $user->generateApiToken();

        // TODO: update app update fields below !!
        return Response::success([
            'api_token'         => $token,
            'force_update'      => false,
            'soft_update'       => true,
            'language_update'   => true,
        ]);
    }

    public function register(Request $request)
    {
        $registerParameters = $request->only(
            'appuid',
            'app_version',
            'language_version',
            'app_language'
        );

        $userExists = User::where('appuid', $registerParameters['appuid'])->exists();
        if ($userExists) {
            return Response::fail(
                ErrorCodes::REGISTER_USER_EXISTS,
                ErrorCodes::REGISTER_USER_EXISTS_MESSAGE
            );
        }

        $canRegister = User::validateForRegister($registerParameters);
        if (!$canRegister) {
            return Response::fail(
                ErrorCodes::REGISTER_PARAMETER_INVALID,
                ErrorCodes::REGISTER_PARAMETER_INVALID_MESSAGE
            );
        }

        User::create($registerParameters);

        return Response::success();
    }

    public function logout(Request $request)
    {
        User::validApiToken($request->header('X-Token'))->update([
            'api_token' => null,
            'api_token_expires_at' => null,
        ]);

        return Response::success();
    }
}
