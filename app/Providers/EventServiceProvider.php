<?php

namespace App\Providers;

use App\Events\NewUserRegisteredEvent;
use App\Events\Order\OrderConfirmedEvent;
use App\Events\Order\OrderCreateEvent;
use App\Events\Order\PaymentStatusUpdateEvent;
use App\Events\Order\ShippingStatusUpdateEvent;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewUserRegisteredEvent::class => [
            \App\Listeners\WelcomeNewCustomerListener::class,
            \App\Listeners\AdminNotificationListener::class,
        ],
        OrderCreateEvent::class => [
            \App\Listeners\Order\Create\User\CustomerListener::class,
            \App\Listeners\Order\Create\Admin\AdminListener::class,
        ],
        OrderConfirmedEvent::class => [
            \App\Listeners\Order\Confirm\User\CustomerListener::class,
            \App\Listeners\Order\Confirm\Admin\AdminListener::class,
        ],
        ShippingStatusUpdateEvent::class => [
            \App\Listeners\Order\ShippingStatus\CustomerListener::class,
        ],
        PaymentStatusUpdateEvent::class => [
            \App\Listeners\Order\PaymentStatus\User\CustomerListener::class,
            \App\Listeners\Order\PaymentStatus\Admin\AdminListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
