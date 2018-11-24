<?php

namespace App\Webservice;

class Response
{
    /**
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     *
     * Returns Success Response
     */
    public static function success($data = null)
    {
        return self::send(
            ErrorCodes::SUCCESS,
            ErrorCodes::SUCCESS_MESSAGE,
            $data
        );
    }

    /**
     * @param $errorCode
     * @param $errorMessage
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     *
     * Returns Failed Response
     */
    public static function fail($errorCode, $errorMessage, $data = null)
    {
        return self::send(
            $errorCode,
            $errorMessage,
            $data
        );
    }

    /**
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     *
     * Return Server Error (500)
     */
    public static function serverError($data = null)
    {
        return self::send(
            ErrorCodes::SERVER_ERROR,
            ErrorCodes::SERVER_ERROR_MESSAGE,
            $data
        );
    }

    /**
     * @param $errorCode
     * @param $errorMessage
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     *
     * Returns JSON Response
     */
    public static function send($errorCode, $errorMessage, $data)
    {
        return response()->json([
            'errorCode'     => $errorCode,
            'errorMessage'  => $errorMessage,
            'result'        => $data
        ]);
    }
}
