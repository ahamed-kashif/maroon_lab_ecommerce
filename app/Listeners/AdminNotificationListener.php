<?php

namespace App\Listeners;

use App\Events\NewUserRegisteredEvent;
use App\Mail\CustomerRegistrationMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class AdminNotificationListener
{

    /**
     * Handle the event.
     *
     * @param  NewUserRegisteredEvent  $event
     * @return void
     */
    public function handle(NewUserRegisteredEvent $event)
    {
        Mail::to('admin@maroon.lab')->send(new CustomerRegistrationMessage($event->user));
    }
}
