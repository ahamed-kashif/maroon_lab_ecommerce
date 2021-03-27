@component('mail::message')
# CONFIRMATION
Dear Valued {{$order->user->name}},

Yours order <b>#{{strtoupper($order->code)}}</b> has been {{$order->status}}.
@component('mail::button', ['url' => route('customer.order.show',$order->id)])
   Your Order
@endcomponent
For Order Query, call us

Thanks,<br>
{{ config('app.name') }}
@endcomponent
