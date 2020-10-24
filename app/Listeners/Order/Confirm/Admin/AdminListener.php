<?php

namespace App\Listeners\Order\Confirm\Admin;

use App\Events\Order\OrderConfirmedEvent;
use App\Mail\Order\Admin\OrderConfirmation;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class AdminListener implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param  OrderConfirmedEvent  $event
     * @return void
     */
    public function handle(OrderConfirmedEvent $event)
    {
        $admins = User::role('super-admin')->get();
        foreach ($admins as $admin){
            Mail::to($admin->email)->send(new OrderConfirmation($event->order));
        }
    }
}
