<?php

namespace App\Listeners\Order\Confirm\User;

use App\Events\Order\OrderConfirmedEvent;
use App\Mail\Order\User\OrderConfirmation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class CustomerListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  OrderConfirmedEvent  $event
     * @return void
     */
    public function handle(OrderConfirmedEvent $event)
    {
        Mail::to($event->order->user->first()->email)->send(new OrderConfirmation($event->order));
    }
}
