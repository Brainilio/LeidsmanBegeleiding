<?php

namespace App\Handlers\Events;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use App\User;


class AuthLoginEventhandler
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
     * @param  Event  $event
     * @return void
     */
    public function handle(Login $event)
    {
        Log::info('Logged in'); //Hij pakt info vanuit de log en kijkt als iemand is ingelogt
        $user = auth()->user(); //degene die is ingelogd
        $user->logincounter++; //voegt constant 1ntje toe bij de login counter.
        $user->save();



    }
}
