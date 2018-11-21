<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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
        'password', 'remember_token',
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

        $this->api_token_expires_at = \Carbon\Carbon::now()->addHour(4);
        return $this->save();
    }
}
