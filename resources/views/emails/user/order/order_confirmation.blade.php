@component('mail::message')
# Hello {{$order->user->name}}

Your order <b>#{{strtoupper($order->code)}}</b> has been {{$order->status}}.

Click this button to see this order
@component('mail::button', ['url' => route('customer.order.show',$order->id)])
Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
