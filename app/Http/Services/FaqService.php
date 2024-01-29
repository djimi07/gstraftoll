<?php

namespace App\Http\Services;

use App\Http\BarbieApiUrl;
use GuzzleHttp\Client;

class FaqService
{
    private $client = null;

    public function __construct()
    {
        if (!$this->client) {
            $this->client = new Client();
        }
    }


    public  function listFaq(): array
    {


        $response = $this->client->request("GET", BarbieApiUrl::FAQ_LIST_URL);
        $payload = json_decode($response->getBody()->getContents());
        return $payload;

    }



}
