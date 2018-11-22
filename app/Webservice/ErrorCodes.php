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

    const USER_NOT_FOUND = 10;
    const USER_NOT_FOUND_MESSAGE = 'User not found';

    const REGISTER_USER_EXISTS = 11;
    const REGISTER_USER_EXISTS_MESSAGE = 'User exists';

    const REGISTER_PARAMETER_INVALID = 12;
    const REGISTER_PARAMETER_INVALID_MESSAGE = 'Invalid or missing parameters';
}
