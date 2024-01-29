<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Http\Services\AnprCaptureService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    protected ?AnprCaptureService $anprCaptureService = null;

    public function __construct()
    {
        if ($this->anprCaptureService == null) {
            $this->anprCaptureService = new AnprCaptureService();
        }
    }

    // Dashboard
    public function dashboardAnalytics(Request $request)

    {
        //dd(Auth::user());
        $pageConfigs = ['pageHeader' => false];

        return view('/auth/dashboard/admin', ['pageConfigs' => $pageConfigs]);
    }


}
