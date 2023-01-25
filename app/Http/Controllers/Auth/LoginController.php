<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(LoginRequest $request){

        $fieldData = $request->all();

        if(auth()->attempt(array('email' => $fieldData['email'], 'password' => $fieldData['password']))){
            if(auth()->user()->type == 1){
                return redirect()->route('admin.route');
            } elseif(auth()->user()->type == 0){
                 return redirect()->away('https://www.google.com');
                 auth()->logout();
            }

        } else {
            return redirect()->route('login')->with('error','Your provided information wrong!');
        }

    }
}
