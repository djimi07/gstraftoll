<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (session()->has('back_url')) {
            $this->redirectTo = session()->get('back_url');
        }
        $this->middleware('guest')->except('logout');
    }

    // Login
    public function showLoginForm(Request $request)
    {


        //dd(Auth::user());
        if (Auth::user() != null) {
            return redirect()->route('dashboard');
        }
        $pageConfigs = [
            'bodyClass' => "bg-full-screen-image",
            'blankPage' => true
        ];


        return view('/auth/login', [
            'pageConfigs' => $pageConfigs
        ]);
    }

    /**
     * Handle an authentication attempt.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function authenticate(Request $request)
    {

        /*
         *
         {
        "id":"a972cd09-8c9b-43a1-9e53-88bf4defc24f",
        "firstname":"Sakinah","lastname":"Abdulhakim",
        "stateOfResidence":"Kano",
        "email":"sakinah@yopmail.com",
        "username":"sakinah@yopmail.com",
        "phone":"08039093456","deleted":false,"userType":"User","rcNumber":null,
        "accountType":"PERSONAL","gender":null,"createdAt":"2022-11-13T11:52:03.037Z",
        "updatedAt":"2022-11-25T22:58:58.116Z","lastLoginAt":"2022-11-25T22:58:58.111Z",
        "token":"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6ImE5NzJjZDA5LThjOWItNDNhMS05ZTUzLTg4YmY0ZGVmYzI0ZiIsImVtYWlsIjoic2FraW5haEB5b3BtYWlsLmNvbSIsImZpcnN0bmFtZSI6IlNha2luYWgiLCJsYXN0bmFtZSI6IkFiZHVsaGFraW0iLCJpYXQiOjE2Njk0MTcyNTYsImV4cCI6MTY2OTY3NjQ1Nn0.A6N7Rt76zhyAZA-Np0A1w9BKgQToZPLxGvNqKQAlagk","token_type":"JWT"
        }

         */

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }


        return redirect()->route('landing-page')->with('msg:error', "Invalid email or password provided. Authentication failed.");
    }
}
