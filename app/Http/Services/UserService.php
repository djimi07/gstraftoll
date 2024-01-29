<?php

namespace App\Http\Services;

use App\Http\GsTrafTollApiUrl;
use Illuminate\Support\Facades\Http;

class UserService
{

    public function __construct()
    {

    }

    public function apiSubmitUser($token, $data)
    {
        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::USER_LIST_URL);

        $response = Http::withToken($token)->post($url, $data);
        $payload = json_decode($response->getBody()->getContents());

        return ($payload);

    }

    public function apiGetUsers($token)
    {
        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::USER_LIST_URL);

        $response = Http::withToken($token)->get($url);
        $payload = json_decode($response->getBody()->getContents());

        return ($payload);
    }

    public function apiDeleteUser($token, $id)
    {
        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::USER_LIST_URL . '/' . $id);

        $response = Http::withToken($token)->delete($url);
        $payload = json_decode($response->getBody()->getContents());

        return ($payload);
    }

    public function apiGetUser($token, $id)
    {
        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::USER_LIST_URL . '/' . $id);

        $response = Http::withToken($token)->get($url);
        $payload = json_decode($response->getBody()->getContents());

        return ($payload);
    }

    public function apiEditUser($token, $id, $data)
    {
        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::USER_LIST_URL . '/' . $id);

        $response = Http::withToken($token)->put($url, $data);
        $payload = json_decode($response->getBody()->getContents());

        return ($payload);
    }

}