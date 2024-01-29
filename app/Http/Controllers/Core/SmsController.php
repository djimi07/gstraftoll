<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Http\Services\SmsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SmsController extends Controller
{

    protected ?SmsService $smsService = null;

    public function __construct()
    {
        if ($this->smsService == null) {
            $this->smsService = new SmsService();
        }
    }


    public function create(Request $request)

    {

        return view("sms/create");
    }
    public function createSms(Request $request)

    {
        $token = Auth::user()->token;

        $sms = $this->smsService->submitSms($token, $request->all());
        return $sms;
    }


    public function listSmsApi(Request $request)

    {
        $token = Auth::user()->token;
        $query = "";
        $invoice = $this->smsService->list($token, $query);
        return $invoice;
    }


    public function listSms(Request $request)

    {

        return view("sms/list");
    }


    /*
     * Display bulk invoice form
     */





}
