<?php

namespace App\Http\Services;

use App\Http\GsTrafTollApiUrl;
use Illuminate\Support\Facades\Http;

class AnprCaptureService
{

    public function __construct()
    {

    }

    public function apiGetCapture($token, $id)
    {
        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::CAPTURE_URL . '/' . $id);

        $response = Http::withToken($token)->get($url);
        $payload = json_decode($response->getBody()->getContents());

        return ($payload);
    }


    public function listRecentCapture($token): array
    {
        // dd(Auth::user());

        // dd($token);
        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::RECENT_CAPTURE_LIST_URL);

        $response = Http::withToken($token)->get($url);
        $payload = json_decode($response->getBody()->getContents());

        // dd($payload);
        return (['data' => $payload->data]);

    }

    public function list($token)
    {
        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::CAPTURE_LIST_URL);

        $response = Http::withToken($token)->get($url);
        $payload = json_decode($response->getBody()->getContents());

        return ($payload);
    }


}