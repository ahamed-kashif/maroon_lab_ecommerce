@component('mail::message')
# Hello

A new order just arrived!<br>
#ORDER CODE: {{$order->code}}
<small>Click the button below to see the order.</small>
@component('mail::button', ['url' => ''])
New Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
