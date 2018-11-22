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

    const LOGIN_USER_NOT_EXISTS = 11;
    const LOGIN_USER_NOT_EXISTS_MESSAGE = 'User not exists';

    const REGISTER_USER_EXISTS = 12;
    const REGISTER_USER_EXISTS_MESSAGE = 'User already exists';

    const SOUND_NOT_FOUND = 20;
    const SOUND_NOT_FOUND_MESSAGE = 'Sound not found';

    const PARAMETER_INVALID = 13;
    const PARAMETER_INVALID_MESSAGE = 'Invalid or missing parameters';

    const METHOD_NOT_EXISTS = 404;
    const METHOD_NOT_EXISTS_MESSAGE = 'Api method not exists';

    const METHOD_NOT_ALLOWED = 405;
    const METHOD_NOT_ALLOWED_MESSAGE = 'Http method not allowed';

    const SERVER_ERROR = 500;
    const SERVER_ERROR_MESSAGE = 'Server error';
}
