<?php

namespace App\CoreExtensions;

use Illuminate\Auth\SessionGuard;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * Extended SessionGuard() functionality
 * Provides added functionality to store the OAuth tokens in the session for later use
 *
 * @category guards
 *
 * @see https://stackoverflow.com/questions/36087061/extending-laravel-5-2-sessionguard
 */
class SessionGuardExtended extends SessionGuard
{

    /**
     * Log a user into the application.
     *
     * @param \Illuminate\Contracts\Auth\Authenticatable $p_oUser
     * @param bool $p_remember
     * @return void
     */
    public function login(Authenticatable $p_oUser, $p_remember = false)
    {

        parent::login($p_oUser, $p_remember);

        /**
         * Writing the JWT to the session
         */
        $key = 'authtokens';
        $this->session->put(
            $key,
            [
                'access_token' => $p_oUser->getAccessToken(),
                'refresh_token' => $p_oUser->getRefreshToken(),
            ]
        );
    }

    /**
     * Log the user out of the application.
     *
     * @return void
     */
    public function logout()
    {
        parent::logout();

        /**
         * Deleting the jwt  from the session
         */
        $this->session->forget('authtokens');
        $this->session->forget('barbieUser');
    }

}
