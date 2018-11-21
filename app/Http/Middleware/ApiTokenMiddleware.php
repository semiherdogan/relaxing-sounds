<?php

namespace App\Http\Middleware;

use App\User;
use App\Webservice\ErrorCodes;
use App\Webservice\Response;
use Closure;

class ApiTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $headerToken = $request->header('X-Token');
        $headerTokenExists = User::apiToken($headerToken)->exists();
        if (!$headerToken || !$headerTokenExists) {
            return Response::fail(
                ErrorCodes::TOKEN_INVALID,
                ErrorCodes::TOKEN_INVALID_MESSAGE
            );
        }

        return $next($request);
    }
}
