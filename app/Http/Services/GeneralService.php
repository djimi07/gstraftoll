<?php

namespace App\Http\Services;

use App\Http\GsTrafTollApiUrl;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\HttpClientException;
use Illuminate\Support\Facades\Http;

class GeneralService
{

    public function __construct()
    {
    }

    public function listLGAs($token, $stateName)
    {
        // dd(Auth::user());


        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::LIST_LGAS_URL . "/" . $stateName);
        try {
            $response = Http::get($url);
            $payload = json_decode($response->getBody()->getContents());

            //dd($payload);
            return (['data' => $payload->data]);
        } catch (ConnectionException $exception) {
            throw $exception;
        } catch (HttpClientException $exception) {
            throw $exception;
        }
    }

    public function listRevenueItems($token, $revenueCode)
    {
        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::LIST_REVENUE_HEAD_BY_CODE_URL . "/" . $revenueCode);
        try {
            $response = Http::get($url);
            $payload = json_decode($response->getBody()->getContents());


            //dd($payload);
            return (['data' => $payload->data]);
        } catch (ConnectionException $exception) {
            throw $exception;
        } catch (HttpClientException $exception) {
            throw $exception;
        }
    }

    public function listRevenueItemsByType($token, $classification)
    {
        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::REVENUE_ITEMS_LIST_URL . "/" . $classification);
        try {
            $response = Http::get($url);
            $payload = json_decode($response->getBody()->getContents());


            //dd($payload);
            return (['data' => $payload->data]);
        } catch (ConnectionException $exception) {
            throw $exception;
        } catch (HttpClientException $exception) {
            throw $exception;
        }
    }

    public function listRevenueHeads($token)
    {
        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::REVENUE_HEAD_LIST_URL);
        //dd($url);
        try {
            $response = Http::get($url);
            $payload = json_decode($response->getBody()->getContents());


            //dd($payload);
            return (['data' => $payload->data]);
        } catch (ConnectionException $exception) {
            throw $exception;
        } catch (HttpClientException $exception) {
            throw $exception;
        }
    }

    public function getRevenueItemById( $id)
    {

        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::REVENUE_ITEMS_LIST_URL . "/by-code/" .$id);
        try {
            $response = Http::get($url);
            $payload = json_decode($response->getBody()->getContents());


            //dd($payload);
            return (['data' => $payload->data]);
        } catch (ConnectionException $exception) {
            throw $exception;
        } catch (HttpClientException $exception) {
            throw $exception;
        }
    }
}
