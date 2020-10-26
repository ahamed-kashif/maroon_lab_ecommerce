@component('mail::message')
# Hello

Order <b>#{{strtoupper($order->code)}}</b> has been {{$order->status}}.

Click this button to see this order
@component('mail::button', ['url' => route('admin.order.show',$order->id)])
Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
