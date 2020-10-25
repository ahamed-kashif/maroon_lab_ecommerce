<?php

namespace App\Listeners\Order\Cancel\Admin;

use App\Events\Order\OrderCancelEvent;
use App\Mail\Order\Admin\OrderCancel;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class AdminListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  OrderCancelEvent  $event
     * @return void
     */
    public function handle(OrderCancelEvent $event)
    {
        $admins = User::role('super-admin')->get();
        foreach ($admins as $admin){
            Mail::to($admin->email)->send(new OrderCancel($event->order));
        }
    }
}
