@component('mail::message')
# Hello,

Order <b>#{{strtoupper($order->code)}}</b> is {{$order->transaction->status}}!
Transaction CODE: {{$order->transaction->code}}

Hit the button below to see the change!
@component('mail::button', ['url' => route('admin.order.show',$order->id)])
ORDER
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
