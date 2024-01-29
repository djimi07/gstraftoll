<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Http\Services\VehicleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{

    protected ?VehicleService $vehicleService = null;

    public function __construct()
    {
        if ($this->vehicleService == null)
        {
            $this->vehicleService = new VehicleService();
        }
    }


    public function apiList(Request $request)
    {

        $token = Auth::user()->token;

        $vehicles = $this->vehicleService->list($token);
        //dd($recentCapture);
        return $vehicles;
    }

    public function apiVehicleApplicants(Request $request)
    {
        $token = Auth::user()->token;

        $vehicles = $this->vehicleService->submitApplication($token, $request->all());
        return $vehicles;
    }

    public function apiVehicleDocuments(Request $request)
    {
        $token = Auth::user()->token;

        $vehicles = $this->vehicleService->submitDocuments($token, $request->all());
        return $vehicles;
    }

    public function apiVehicleDelete($id)
    {
        $token = Auth::user()->token;

        $vehicle = $this->vehicleService->deleteVehicles($token, $id);
        return $vehicle;
    }

    public function apiGetVehicle($id)
    {
        $token = Auth::user()->token;

        $vehicle = $this->vehicleService->getVehicle($token, $id);
        return $vehicle;
    }

    public function apiGetDocuments()
    {
        $token = Auth::user()->token;

        $documents = $this->vehicleService->apiGetDocuments($token);
        return $documents;
    }


    public function editApplicant(Request $Request, $id)
    {
        $token = Auth::user()->token;

        $vehicle = $this->vehicleService->apiEditApplicant($token, $id, $Request->all());
        return $vehicle;
    }

    public function editDocuments(Request $Request, $id)
    {
        $token = Auth::user()->token;


        $vehicle = $this->vehicleService->apiEditDocuments($token, $id, $Request->all());
        return $vehicle;
    }

    public function view(Request $Request, $id)
    {

        $vehicle = $this->apiGetVehicle($id);
        return view("vehicles/view", ['vehicle' => $vehicle]);
    }


    public function list(Request $request)
    {
        return view("vehicles/list");
    }

    public function edit(Request $request, $id)
    {
        $vehicle = $this->apiGetVehicle($id);

        return view("vehicles/edit", ['vehicle' => $vehicle]);
    }

    public function register(Request $request)
    {
        return view("vehicles/register");
    }

}