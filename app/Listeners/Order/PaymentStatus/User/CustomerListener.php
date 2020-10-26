<?php

namespace App\Listeners\Order\PaymentStatus\User;

use App\Events\Order\PaymentStatusUpdateEvent;
use App\Mail\Order\User\PaymentStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class CustomerListener implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param  PaymentStatusUpdateEvent  $event
     * @return void
     */
    public function handle(PaymentStatusUpdateEvent $event)
    {
        Mail::to($event->order->user->email)->send(new PaymentStatus($event->order));
    }
}
