<?php

namespace App\Listeners\Order\Create\User;

use App\Events\Order\OrderCreateEvent;
use App\Mail\Order\User\OderPlaced;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class CustomerListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  OrderCreateEvent  $event
     * @return void
     */
    public function handle(OrderCreateEvent $event)
    {
        Mail::to($event->user->email)->send(new OderPlaced($event->user));
    }
}
