<?php

namespace App\Http\Services;

use App\Http\GsTrafTollApiUrl;
use Illuminate\Support\Facades\Http;

class RoleService
{

    public function __construct()
    {

    }

    public function apiGetRoles($token)
    {
        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::ROLE_LIST_URL);

        $response = Http::withToken($token)->get($url);
        $payload = json_decode($response->getBody()->getContents());

        return ($payload);
    }


}