<?php

namespace App\Listeners\Order\Cancel\User;

use App\Events\Order\OrderCancelEvent;
use App\Mail\Order\User\OrderCancel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class CustomerListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  OrderCancelEvent  $event
     * @return void
     */
    public function handle(OrderCancelEvent $event)
    {
        Mail::to($event->order->user->email)->send(new OrderCancel($event->order));
    }
}
