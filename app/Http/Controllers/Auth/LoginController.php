<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Events\SessionStarteds;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
                 return redirect()->route('guest.route');
                                 event(new SessionStarteds);
                $request->session()->regenerateToken();
                $request->session()->invalidate();
                 //return redirect()->away('https://www.medicapanamericana.com/digital/ebooks/buscador');
            }

        } else {
            return redirect()->route('login')->with('error','Your provided information wrong!');
        }

    }
	public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->regenerateToken();
        $request->session()->invalidate();
        return redirect('/login');
    }
}