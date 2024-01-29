<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Http\Services\AnprCaptureService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnprCaptureController extends Controller
{

    protected ?AnprCaptureService $anprCaptureService = null;

    public function __construct()
    {
        if ($this->anprCaptureService == null)
        {
            $this->anprCaptureService = new AnprCaptureService();
        }
    }



    public function apiListRecent(Request $request)
    {

        $token = Auth::user()->token;
        // dd($token);
        $recentCapture = $this->anprCaptureService->listRecentCapture($token);
        //dd($recentCapture);
        return $recentCapture;
    }

    public function apiList(Request $request)
    {

        $token = Auth::user()->token;
        // dd($token);
        $recentCapture = $this->anprCaptureService->list($token);
        //dd($recentCapture);
        return $recentCapture;
    }

    public function getCapture($id)
    {
        $token = Auth::user()->token;

        $capture = $this->anprCaptureService->apiGetCapture($token, $id);

        return $capture;

    }

    public function captureView($id)
    {
        $capture = $this->getCapture($id);

        return view("captures/details", compact('capture' ));
    }

    public function list(Request $request)
    {
        return view("captures/list");
    }

}
