<?php

namespace App\Webservice;

use App\User;

class WSHelper
{
    const API_HEADER_KEY = 'X-Token';

    public static function getUser()
    {
        return self::getUserModel()->first();
    }

    public static function getUserModel()
    {
        return User::validApiToken(self::getUserToken());
    }

    public static function getUserToken()
    {
        return request()->header(self::API_HEADER_KEY);
    }
}