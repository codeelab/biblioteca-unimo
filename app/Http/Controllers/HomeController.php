<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\SessionStarteds;
use Illuminate\Support\Facades\Auth;

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
}