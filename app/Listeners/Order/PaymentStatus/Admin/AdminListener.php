<?php

namespace App\Listeners\Order\PaymentStatus\Admin;

use App\Events\Order\PaymentStatusUpdateEvent;
use App\Mail\Order\Admin\PaymentStatus;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class AdminListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  PaymentStatusUpdateEvent  $event
     * @return void
     */
    public function handle(PaymentStatusUpdateEvent $event)
    {
        $admins = User::role('super-admin')->get();
        foreach ($admins as $admin){
            Mail::to($admin->email)->send(new PaymentStatus($event->order));
        }
    }
}
