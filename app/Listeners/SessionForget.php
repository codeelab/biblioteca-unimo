<?php

namespace App\Listeners;

use App\Events\SessionForgets;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SessionForget
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SessionForget  $event
     * @return void
     */
    public function handle(SessionForget $event)
    {
        Auth::logout();
        $event->request->session::put('url.intended', URL::full()); 
    }
}