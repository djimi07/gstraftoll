<?php

namespace App\Http\Services;

use App\Http\GsTrafTollApiUrl;
use Illuminate\Support\Facades\Http;

class PaymentService
{

    public function __construct()
    {

    }

    public function list($token, $query)
    {
        $url = is_null($query) ? GsTrafTollApiUrl::get(GsTrafTollApiUrl::PAYMENT_LIST_URL) : GsTrafTollApiUrl::get
        (GsTrafTollApiUrl::PAYMENT_LIST_URL . $query);

        $response = Http::withToken($token)->get($url);
        $payload = json_decode($response->getBody()->getContents());

        return ($payload);
    }




    public function getPayment($token, $id)
    {
        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::PAYMENT_LIST_URL . '/' . $id);


        $response = Http::withToken($token)->get($url);
        $payload = json_decode($response->getBody()->getContents());

        return ($payload->data);

    }

}
