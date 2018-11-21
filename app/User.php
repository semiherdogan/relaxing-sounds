<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
}
