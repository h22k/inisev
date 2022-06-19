<?php

namespace App\Listeners;

use App\Events\UserSignedUpEvent;
use App\Jobs\SendRegisterMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserSignedUpListener
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
     * @param  UserSignedUpEvent  $event
     * @return void
     */
    public function handle(UserSignedUpEvent $event)
    {
        $user = $event->user;

        SendRegisterMail::dispatch($user);
    }
}
