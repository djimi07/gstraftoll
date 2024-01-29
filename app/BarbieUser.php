<?php
namespace App;

use Illuminate\Auth\GenericUser;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
 use Illuminate\Notifications\Notifiable;

class BarbieUser extends GenericUser implements UserContract
{
    use  Notifiable;
    protected $rememberTokenName = 'remember_token';
    /**
     * Returns the JWT access_token
     *
     * @return mixed
     */
    public function getAccessToken()
    {
        return $this->attributes['access_token'];
    }


    public function getRefreshToken()
    {
        return $this->attributes['refresh_token'];
    }


    public function getRememberToken()
    {
        return $this->rememberTokenName;
    }

    public function setRememberToken($value)
    {
        $this->rememberTokenName = $value;
    }

    public function getRememberTokenName()
    {
        return $this->rememberTokenName;
    }
}
