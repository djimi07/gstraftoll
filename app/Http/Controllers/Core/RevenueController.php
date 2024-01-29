<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Http\GsTrafTollApiUrl;
use App\Http\Services\RevenueHeadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RevenueController extends Controller
{

    protected ?RevenueHeadService $headService = null;

    public function __construct()
    {
        if ($this->headService == null) {
            $this->headService = new RevenueHeadService();
        }
    }

    // Revenue Head
    public function headList(Request $request)
    {
     $agency_list= ($this->headService->listRevenueAgencies(Auth::user()->token));


        return view("revenueHead/list",  compact('agency_list'));
    }

    public function getRevenueHeadList()
    {
        $result =
        $this->headService->listRevenueHead(Auth::user()->token);

        return $result;
    }

    public function submitRevenueHead(Request $request)
    {
        $data = $request->data;
        $data['agencyId'] = intval($data['agencyId']);
        if($request->flag == 'Add'){
            $result =
            $this->headService->submitRevenueHead(Auth::user()->token, (object) $data);
        }else {
            //unset($data['agencyId']);
            $result=
            $this->headService->updateRevenueHead(Auth::user()->token,$request->id, (object) $data);
        }

        return $result;
    }

    public function deleteRevenueHead(Request $request)
    {
        $result =
        $this->headService->deleteRevenueHead(Auth::user()->token,$request->id);

        return $result;
    }

    // Revenue Item
    public function itemList()
    {
        $data =  $this->headService->listRevenueHead(Auth::user()->token);
        $revenue_head = $data['data'];
        return view("revenueItem/list", compact('revenue_head'));
    }

    public function getRevenueItemList()
    {
        $result =
        $this->headService->listRevenueItems(Auth::user()->token);

        return $result;
    }

    public function submitRevenueItem(Request $request)
    {
        $data = $request->data;
        $data['revenueHeadId'] = intval($data['revenueHeadId']);
        $data['point'] = intval($data['point']);
        if($request->flag == 'Add'){
            $result =
            $this->headService->submitRevenueItem(Auth::user()->token, (object) $data);
        }else {
            $result =
            $this->headService->updateRevenueItem(Auth::user()->token,$request->id, (object) $data);

        }

        return $result;
    }

    public function deleteRevenueItem(Request $request)
    {
        $result =
        $this->headService->deleteRevenueItem(Auth::user()->token,$request->id);


        return $result;
    }


}
