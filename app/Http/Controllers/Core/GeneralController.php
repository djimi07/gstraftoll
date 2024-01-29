<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Http\Services\GeneralService;
use Illuminate\Http\Request;


class GeneralController extends Controller
{
    protected ?GeneralService $generalService = null;

    public function __construct()
    {
        if ($this->generalService == null) {
            $this->generalService = new GeneralService();
        }
    }

    public function listLgasApi(Request $request)
    {
        return $this->generalService->listLGAs(null, $request->query('state'));
    }

    public function listRevenueHeadsApi(Request $request)
    {
        return $this->generalService->listRevenueHeads(null);


    }

    public function listRevenueItemsApi(Request $request)
    {
        if ($request->query('type') != null) {
            return $this->generalService->listRevenueItemsByType(null, $request->query('type'));
        }
        return $this->generalService->listRevenueItems(null, $request->query('code'));
    }

    public function getRevenueItemByIdApi($id)
    {

        return $this->generalService->getRevenueItemById($id);

    }
}
