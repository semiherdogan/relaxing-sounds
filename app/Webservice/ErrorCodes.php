<?php

namespace App\Webservice;

/**
 * Class ErrorCodes
 * @package App\Webservice
 *
 * API Error Codes & Messages stores here.
 */
abstract class ErrorCodes
{
    const SUCCESS = 0;
    const SUCCESS_MESSAGE = null;

    const TOKEN_INVALID = 2;
    const TOKEN_INVALID_MESSAGE = 'Api token invalid';

    const USERNAME_PASSWORD_INCORRECT = 10;
    const USERNAME_PASSWORD_INCORRECT_MESSAGE = 'Username or password incorrect';

    const REGISTER_PARAMETER_INVALID = 11;
    const REGISTER_PARAMETER_INVALID_MESSAGE = 'Invalid or missing parameters';
}
