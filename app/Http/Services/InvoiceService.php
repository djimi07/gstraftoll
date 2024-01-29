<?php

namespace App\Http\Services;

use App\Http\GsTrafTollApiUrl;
use Illuminate\Support\Facades\Http;

class InvoiceService
{

    public function __construct()
    {

    }

    public function list($token, $query)
    {
        $url = is_null($query) ? GsTrafTollApiUrl::get(GsTrafTollApiUrl::INVOICE_LIST_URL) : GsTrafTollApiUrl::get
        (GsTrafTollApiUrl::INVOICE_LIST_URL . $query);

        $response = Http::withToken($token)->get($url);
        $payload = json_decode($response->getBody()->getContents());

        return ($payload);
    }

    public function submitInvoice($token, $data)
    {
        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::INVOICE_LIST_URL);

        $response = Http::post($url, $data);
        $payload = json_decode($response->getBody()->getContents());

        return ($payload);
    }


    public function getInvoice($token, $id)
    {
        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::INVOICE_LIST_URL . '/' . $id);


        $response = Http::withToken($token)->get($url);
        $payload = json_decode($response->getBody()->getContents());

        return ($payload);

    }

}
