<?php

namespace App\Listeners;

use App\Events\SessionStarteds;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class LogoutUser
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
     * @param  SessionStarteds  $event
     * @return void
     */
    public function handle(SessionStarteds $event)
    {
        Auth::logout();
    }
}