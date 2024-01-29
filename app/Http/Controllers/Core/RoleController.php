<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Http\Services\RoleService;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{

    protected ?RoleService $roleservice = null;

    public function __construct()
    {
        if ($this->roleservice == null)
        {
            $this->roleservice = new RoleService();
        }
    }


    public function apiList(Request $request)
    {
        $token = Auth::user()->token;

        $user = $this->roleservice->apiGetRoles($token);

        return $user;
    }


}