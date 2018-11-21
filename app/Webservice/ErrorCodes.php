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
    const TOKEN_INVALID_MESSAGE = 'Api token invalid.';

    const TOKEN_EXPIRED = 3;
    const TOKEN_EXPIRED_MESSAGE = 'Api token expired.';
}
