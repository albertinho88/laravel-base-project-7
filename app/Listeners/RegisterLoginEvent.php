<?php

namespace App\Listeners;

use App\Events\UserLogged;
use App\Models\Security\LoginEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterLoginEvent
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
     * @param  UserLogged  $event
     * @return void
     */
    public function handle(UserLogged $event)
    {
        $loginEvent = new LoginEvent();
        $loginEvent->user_id = $event->user->user_id;
        $loginEvent->browser = request()->header('User-Agent');
        $loginEvent->ip = request()->getClientIp();
        $loginEvent->save();
    }
}
