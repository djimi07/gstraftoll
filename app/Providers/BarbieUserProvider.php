<?php

namespace App\Providers;

use App\BarbieUser;
use App\Http\GsTrafTollApiUrl;
use GuzzleHttp\Client;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\Session;

/**
 * Delegates API user login and authentication
 *
 * @category providers
 */
class BarbieUserProvider implements UserProvider
{

    /**
     * Custom API Handler
     * Used to request API and capture responses
     *
     * @var \Path\To\Your\Internal\Api\Handler
     */
    private $_oApi = null;
    private $_url =null;

    /**
     * POST request to API
     *
     * @param array $p_arrParam Parameters
     *
     * @return array
     */
    private function _post(array $p_arrParam)
    {



        $this->_url =  GsTrafTollApiUrl::get( '/api/v1/auth/login');
        if (!$this->_oApi) {
            $this->_oApi = new Client();
        }


        $response = $this->_oApi->request('POST', $this->_url,
            [
                'json' => [
                    'email' => $p_arrParam['email'],
                    'password' => $p_arrParam['password'],
                ],
                'headers' => [
                    'Content-Type' => 'application/json',
                ]
            ]);


        $payload = json_decode($response->getBody()->getContents(), true);


        if($payload['status'] != 200){
            return null;
        }
        Session::put('barbieUser', $payload);
        Session::put('remember_token', "0");

        return $payload;
    }


    /**
     * Retrieve a user by the given credentials.
     *
     * @param array $p_arrCredentials
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $p_arrCredentials)
    {
        $arrResponse = $this->_post($p_arrCredentials);

        //dd($arrResponse);
        if ($arrResponse) {
            $arrPayload = array_merge(
                $arrResponse['data'],
                $p_arrCredentials
            );
            return $this->getApiUser($arrPayload);
        }
    }

    /**
     * Retrieve a user by their unique identifier.
     *
     * @param mixed $p_id
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($p_id)
    {
        $arrResponse = $this->getUserFromSession();
        if ($arrResponse && $arrResponse['data']['id'] == $p_id) {
            return $this->getApiUser($arrResponse['data']);
        }
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param \Illuminate\Contracts\Auth\Authenticatable $p_oUser
     * @param array $p_arrCredentials
     *
     * @return bool
     */
    public function validateCredentials(UserContract $p_oUser, array $p_arrCredentials)
    {
        return $p_oUser->getAuthPassword() == $p_arrCredentials['password'];
    }

    /**
     * Get the api user.
     *
     * @param mixed $p_user
     *
     * @return \App\Auth\ApiUser|null
     */
    protected function getApiUser($p_user)
    {
        if ($p_user !== null) {
            return new BarbieUser($p_user);
        }
        return null;
    }

    protected function getUserById($id)
    {
        $user = [$this->getUserFromSession()];

        foreach ($this->getUsers() as $item) {
            if ($item['id'] == $id) {
                $user = $item;

                break;
            }
        }

        return $user ?: null;
    }

    protected function getUserByUsername($username)
    {
        $user = [$this->getUserFromSession()];

        foreach ($this->getUsers() as $item) {
            if ($item['username'] == $username) {
                $user = $item;

                break;
            }
        }

        return $user ?: null;
    }


    /**
     * The methods below need to be defined because of the Authenticatable contract
     * but need no implementation for 'Auth::attempt' to work and can be implemented
     * if you need their functionality
     */
    public function retrieveByToken($identifier, $token)
    {

    }

    public function updateRememberToken(UserContract $user, $token)
    {
    }

    private function getUserFromSession()
    {
        return Session::get('barbieUser');
    }

}
