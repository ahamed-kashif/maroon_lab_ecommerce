<?php

namespace App\Listeners\Order\Create\Admin;

use App\Events\Order\OrderCreateEvent;
use App\Mail\Order\Admin\OderReceived;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;


class AdminListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  OrderCreateEvent  $event
     * @return void
     */
    public function handle(OrderCreateEvent $event)
    {
        $admins = User::hasRole('admin|super-admin')->all();
        foreach ($admins as $admin){
            Mail::to($admin->email)->send(new OderReceived($event->order));
        }
    }
}
