<?php

namespace App\Http\Services;

use App\Http\GsTrafTollApiUrl;
use Illuminate\Support\Facades\Http;

class VehicleService
{

    public function __construct()
    {

    }

    public function list($token)
    {
        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::VEHICLE_LIST_URL);

        $response = Http::withToken($token)->get($url);
        $payload = json_decode($response->getBody()->getContents());

        return ($payload);
    }

    public function submitApplication($token, $data)
    {
        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::VEHICLE_LIST_URL);

        $response = Http::withToken($token)->post($url, $data);
        $payload = json_decode($response->getBody()->getContents());

        return ($payload);
    }

    public function submitDocuments($token, $data)
    {
        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::VEHICLE_DOCS_LIST_URL);

        $response = Http::withToken($token)->post($url, $data);
        $payload = json_decode($response->getBody()->getContents());

        return ($payload);
    }

    public function deleteVehicles($token, $id)
    {
        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::VEHICLE_LIST_URL . '/' . $id);


        $response = Http::withToken($token)->delete($url);
        $payload = json_decode($response->getBody()->getContents());

        return ($payload);
    }

    public function getVehicle($token, $id)
    {
        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::VEHICLE_LIST_URL . '/' . $id);



        $response = Http::withToken($token)->get($url);
        $payload = json_decode($response->getBody()->getContents());

        return ($payload);
    }

    public function apiEditApplicant($token, $id, $data)
    {
        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::VEHICLE_LIST_URL . '/' . $id);

        $response = Http::withToken($token)->patch($url, $data);
        $payload = json_decode($response->getBody()->getContents());

        return ($payload);
    }

    public function apiEditDocuments($token, $id, $data)
    {
        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::VEHICLE_DOCS_LIST_URL . '/' . $id);

        $response = Http::withToken($token)->patch($url, $data);
        $payload = json_decode($response->getBody()->getContents());

        return ($payload);
    }

    public function apiGetDocuments($token)
    {
        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::VEHICLE_DOCS_LIST_URL);

        $response = Http::withToken($token)->get($url);
        $payload = json_decode($response->getBody()->getContents());

        return ($payload);
    }

}
