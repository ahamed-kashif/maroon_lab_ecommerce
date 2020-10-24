@component('mail::message')
# Hello {{$order->user->name}},

Sorry to let you know that order #{{strtoupper($order->code)}} is cancelled.<br>
Hit the button below to shop more.

@component('mail::button', ['url' => route('store.index')])
Shop
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
