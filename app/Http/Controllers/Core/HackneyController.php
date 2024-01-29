<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Http\Services\VehicleService;
use Illuminate\Http\Request;

class HackneyController extends Controller
{

    protected ?VehicleService $vehicleService = null;

    public function __construct()
    {
        if ($this->vehicleService == null) {
            $this->vehicleService = new VehicleService();
        }
    }


    public function createInvoice(Request $request)

    {
        $revenueHeadCode = $request->query("code");


        return view("hackney/create", compact("revenueHeadCode"));
    }

    public function createInvoiceLanding(Request $request)

    {
        $revenueHeadCode = 'AIRS0000';


        return view("hackney/pay-hackney-public", compact("revenueHeadCode"));
    }



}
