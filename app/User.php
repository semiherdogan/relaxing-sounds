<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'appuid',
        'app_version',
        'language_version',
        'app_language'
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
     * @return string
     */
    public function generateApiToken()
    {
        $tokenExists = true;
        while ($tokenExists) {
            $this->api_token = str_random(60);
            $tokenExists = $this->where('api_token', $this->api_token)->exists();
        }

        $this->api_token_expires_at = Carbon::now()->addHour(4);
        $this->save();

        return $this->api_token;
    }

    /**
     * @param $query
     * @param $apiToken
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function scopeValidApiToken($query, $apiToken)
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
            'appuid'            => 'required', /*|exists:users*/
            'app_version'       => 'required',
            'language_version'  => 'required'
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
            'appuid'            => 'required', /*|unique:users*/
            'app_version'       => 'required',
            'language_version'  => 'required',
            'app_language'      => 'required',
        ]);

        return $validator->passes();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     * Returns users favorite sounds.
     */
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    /**
     * @param $soundId
     * @return
     */
    public function favored($soundId)
    {
        return Favorite::create([
            'user_id' => $this->id,
            'sound_id' => $soundId
        ]);
    }

    /**
     * @param $soundId
     * @return bool
     */
    public function unFavored($soundId)
    {
        return Favorite::where('user_id', $this->id)
            ->where('sound_id', $soundId)
            ->delete();
    }
}
