<?php

namespace App\Listeners;

use App\Events\NewUserRegisteredEvent;
use App\Mail\CustomerRegistrationMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\User;

class AdminNotificationListener implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param  NewUserRegisteredEvent  $event
     * @return void
     */
    public function handle(NewUserRegisteredEvent $event)
    {
        $admins = User::role('super-admin')->get();
        foreach ($admins as $admin){
            Mail::to($admin->email)->send(new CustomerRegistrationMessage($event->user));
        }

    }
}
