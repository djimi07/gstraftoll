<?php

namespace App\Http\Services;

use App\Http\GsTrafTollApiUrl;
use Illuminate\Support\Facades\Http;

class SmsService
{

    public function __construct()
    {

    }

    public function list($token, $query)
    {
        $url = is_null($query) ? GsTrafTollApiUrl::get(GsTrafTollApiUrl::SMS_LIST_URL) : GsTrafTollApiUrl::get
        (GsTrafTollApiUrl::SMS_LIST_URL . $query);

        $response = Http::withToken($token)->get($url);
        $payload = json_decode($response->getBody()->getContents());

        return ($payload);
    }

    public function submitSms($token, $data)
    {
        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::SMS_LIST_URL);

        $response = Http::withToken($token)->post($url, $data);
        $payload = json_decode($response->getBody()->getContents());

        return ($payload);
    }


    public function getSms($token, $id)
    {
        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::SMS_LIST_URL . '/' . $id);


        $response = Http::withToken($token)->get($url);
        $payload = json_decode($response->getBody()->getContents());

        return ($payload);

    }

}
