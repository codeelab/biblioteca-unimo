<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class SessionStarteds
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}