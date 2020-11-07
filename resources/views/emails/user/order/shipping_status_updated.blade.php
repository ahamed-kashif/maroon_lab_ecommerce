@component('mail::message')
# Hello {{$order->user->name}},

Your order <b>#{{$order->code}}</b>'s shipping status is updated to <b>{{$order->order_tracking->status}}</b>.
To see the update hit the button below!
@component('mail::button', ['url' => route('customer.order.show',$order->id)])
{{strtoupper($order->code)}}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
