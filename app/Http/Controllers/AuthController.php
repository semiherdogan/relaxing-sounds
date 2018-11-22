<?php

namespace App\Http\Controllers;

use App\User;
use App\Webservice\ErrorCodes;
use App\Webservice\Response;
use App\Webservice\WSHelper;
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

        // Validate Parameters
        $userHasValidParameters = User::validateForLogin($loginParameters);
        if (!$userHasValidParameters) {
            return Response::fail(
                ErrorCodes::PARAMETER_INVALID,
                ErrorCodes::PARAMETER_INVALID_MESSAGE
            );
        }

        $user = User::where('appuid', $loginParameters['appuid'])->first();

        // Regenerate Api Token
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

        // Validate Parameters
        $canRegister = User::validateForRegister($registerParameters);
        if (!$canRegister) {
            return Response::fail(
                ErrorCodes::PARAMETER_INVALID,
                ErrorCodes::PARAMETER_INVALID_MESSAGE
            );
        }

        $userExists = User::where('appuid', $registerParameters['appuid'])->exists();
        if ($userExists) {
            return Response::fail(
                ErrorCodes::REGISTER_USER_EXISTS,
                ErrorCodes::REGISTER_USER_EXISTS_MESSAGE
            );
        }

        User::create($registerParameters);

        return Response::success();
    }

    public function logout()
    {
        WSHelper::getUserModel()->update([
            'api_token' => null,
            'api_token_expires_at' => null,
        ]);

        return Response::success();
    }
}
