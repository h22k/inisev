<?php

namespace App\Listeners;

use App\Events\PostPublishedEvent;
use App\Jobs\SendEmail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PostPublishedListener
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
     * @param  PostPublishedEvent  $event
     * @return void
     */
    public function handle(PostPublishedEvent $event): void
    {
        SendEmail::dispatch($event->post);
    }
}
