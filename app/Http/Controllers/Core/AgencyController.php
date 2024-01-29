<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Http\Services\AgencyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgencyController extends Controller
{

    protected ?AgencyService $agencyService = null;

    public function __construct()
    {
        if ($this->agencyService == null)
        {
            $this->agencyService = new AgencyService();
        }
    }

}