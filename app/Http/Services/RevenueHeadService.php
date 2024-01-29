<?php

namespace App\Http\Services;

use App\Http\GsTrafTollApiUrl;
use Illuminate\Support\Facades\Http;


class RevenueHeadService
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

        $response = Http::withToken($token)->post($url, $data);
        $payload = json_decode($response->getBody()->getContents());

        return ($payload);
    }


    public function getInvoice($token, $id)
    {
        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::VEHICLE_LIST_URL . '/' . $id);


        $response = Http::withToken($token)->get($url);
        $payload = json_decode($response->getBody()->getContents());

        return ($payload);

    }


    public function listRevenueAgencies($token)
    {

        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::AGENCIES_LIST_URL);

        $response = Http::withToken($token)->get($url);

        $payload = json_decode($response->getBody()->getContents(), true);
        if ($payload['status'] != 200) {
            return null;
        }
        return $payload['data'];
    }

    public function listRevenueHead($token)
    {

        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::REVENUE_HEAD_LIST_URL);

        $response = Http::withToken($token)->get($url);

        $payload = json_decode($response->getBody()->getContents(), true);
        if ($payload['status'] != 200) {
            return null;
        }
        return $payload;
    }

    public function submitRevenueHead($token, $param)
    {

        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::REVENUE_HEAD_LIST_URL);

        return Http::withToken($token)->post($url, $param);
    }

    public function updateRevenueHead($token, $id, $param)
    {

        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::REVENUE_HEAD_LIST_URL."/".$id);

        return Http::withToken($token)->patch($url, $param);
    }

    public function deleteRevenueHead($token, $id)
    {

        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::REVENUE_HEAD_LIST_URL."/".$id);

        return Http::withToken($token)->delete($url);
    }

    public function listRevenueItems($token)
    {


     $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::REVENUE_ITEMS_LIST_URL);

        $response = Http::withToken($token)->get($url);

        $payload = json_decode($response->getBody()->getContents(), true);
        if ($payload['status'] != 200) {
            return null;
        }
        return $payload;
    }


    public function submitRevenueItem($token, $param)
    {

        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::REVENUE_ITEMS_LIST_URL);

        return Http::withToken($token)->post($url, $param);
    }

    public function updateRevenueItem($token, $id, $param)
    {

        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::REVENUE_ITEMS_LIST_URL."/".$id);

        return Http::withToken($token)->patch($url, $param);
    }

    public function deleteRevenueItem($token, $id)
    {

        $url = GsTrafTollApiUrl::get(GsTrafTollApiUrl::REVENUE_ITEMS_LIST_URL."/".$id);

        return Http::withToken($token)->delete($url);
    }


}
