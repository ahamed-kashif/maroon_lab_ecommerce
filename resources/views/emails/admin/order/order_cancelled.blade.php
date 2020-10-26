@component('mail::message')
# Hello

Sorry to let you know that order #{{strtoupper($order->code)}} is cancelled.<br>
Hit the button below to see the changes.

@component('mail::button', ['url' => route('admin.order.show',$order->id)])
Cancelled Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
