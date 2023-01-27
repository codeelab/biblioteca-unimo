<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listeners\SessionForget;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->route('logout');
    }

    public function authenticationValidateAdmin(){

        return view('admin.home');

    }

    public function authenticationValidateUser(){


        return redirect()->away('https://www.medicapanamericana.com/digital/ebooks/buscador');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        event(new SessionForget($request));
        return Redirect::to('login')->with('error', 'Sesión finalizada');
    }
}