<?php

namespace App\Http\Services;

use App\Http\GsTrafTollApiUrl;
use Illuminate\Support\Facades\Http;

class AgencyService
{

    public function __construct()
    {

    }

    public function getAgencies($token)
    {
        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::AGENCIES_LIST_URL);

        $response = Http::withToken($token)->get($url);
        $payload = json_decode($response->getBody()->getContents());

        return ($payload);
    }

}