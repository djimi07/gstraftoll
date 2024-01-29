<?php

namespace App\Http\Services;

use App\Http\BarbieApiUrl;
use GuzzleHttp\Client;

class SubscriptionPlanService
{
    private $client = null;

    public function __construct()
    {
        if (!$this->client) {
            $this->client = new Client();
        }
    }


    public function listSubscriptionPlans(): array
    {


        $response = $this->client->request("GET", BarbieApiUrl::SUBSCRIPTION_PLAN_LIST_URL);
        $payload = json_decode($response->getBody()->getContents());
        return $payload;

    }

    public function listEquitySubscriptionPlans(): array
    {
        $response = $this->client->request("GET", BarbieApiUrl::SUBSCRIPTION_EQUITIES_LIST_URL);
        $payload = json_decode($response->getBody()->getContents());
        return $payload;
    }

}
