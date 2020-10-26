<?php

namespace App\Listeners\Order\ShippingStatus;

use App\Events\Order\ShippingStatusUpdateEvent;
use App\Mail\Order\User\ShippingStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class CustomerListener implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param  ShippingStatusUpdateEvent  $event
     * @return void
     */
    public function handle(ShippingStatusUpdateEvent $event)
    {
        Mail::to($event->order->user()->first()->email)->send(new ShippingStatus($event->order));
    }
}
