<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Services\RoleService;
use App\Http\Services\AgencyService;
use App\Http\Services\UserService;


class UserController extends Controller
{

    protected ?UserService $userService = null;
    protected ?RoleService $roleService = null;
    protected ?AgencyService $agencyService = null;

    public function __construct()
    {
        if ($this->userService == null)
        {
            $this->userService = new UserService();
        }

        if ($this->roleService == null)
        {
            $this->roleService = new RoleService();
        }

        if ($this->agencyService == null)
        {
            $this->agencyService = new AgencyService();
        }
    }

    public function users_get()
    {
        $token = Auth::user()->token;

        $users = $this->userService->apiGetUsers($token);

        return $users;
    }

    // User add submit
    public function user_add(Request $request)
    {
        $token = Auth::user()->token;

        $user = $this->userService->apiSubmitUser($token, $request->all());

        return $user;
    }

    // User delete

    public function user_delete(Request $request, $id)
    {
        $token = Auth::user()->token;

        $user = $this->userService->apiDeleteUser($token, $id);

        return $user;
    }

    public function getUser($id)
    {
        $token = Auth::user()->token;

        $user = $this->userService->apiGetUser($token, $id);

        return $user;
    }

    public function editSubmit(Request $request, $id)
    {
        $token = Auth::user()->token;

        $user = $this->userService->apiEditUser($token, $id, $request->all());

        return $user;
    }

    public function list(Request $request)
    {
        $token = Auth::user()->token;

        $agencies = $this->agencyService->getAgencies($token);
        $roles = $this->roleService->apiGetRoles($token);

        return view("users/list", ['agencies' => $agencies->data, 'roles' => $roles]);
    }

    public function register(Request $request)
    {
        return view("users/register");
    }

    public function edit(Request $request, $id)
    {
        $token = Auth::user()->token;

        $user = $this->getUser($id);
        $agencies = $this->agencyService->getAgencies($token);
        $roles = $this->roleService->apiGetRoles($token);

        return view("users/edit", ['user' => $user, 'roles' => $roles, 'agencies' => $agencies->data]);
    }



}