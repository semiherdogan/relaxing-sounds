<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Validation\Validator;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Generates Api Token for API
     * @return bool
     */
    public function generateApiToken()
    {
        $tokenExists = true;
        while ($tokenExists) {
            $this->api_token = str_random(60);
            $tokenExists = $this
                ->where('api_token', $this->api_token)
                ->exists();
        }

        $this->api_token_expires_at = Carbon::now()->addHour(4);
        return $this->save();
    }

    /**
     * @param $query
     * @param $apiToken
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function scopeApiToken($query, $apiToken)
    {
        return $query
            ->where('api_token', $apiToken)
            ->where('api_token_expires_at', '>', Carbon::now());
    }

    /**
     * @param $data
     * @return bool
     *
     * Validates data for login
     */
    public static function validateForLogin($data)
    {
        $validator = Validator::make($data, [
            'email'     => 'required|exists:users',
            'password'  => 'required',
        ]);

        return $validator->passes();
    }

    /**
     * @param $data
     * @return bool
     *
     * Validates data for register
     */
    public static function validateForRegister($data)
    {
        $validator = Validator::make($data, [
            'name'      => 'required',
            'email'     => 'required|unique:users',
            'password'  => 'required|min:6',
        ]);

        return $validator->passes();
    }
}
