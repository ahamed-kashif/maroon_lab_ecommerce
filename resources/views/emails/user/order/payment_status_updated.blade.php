@component('mail::message')
# Hello {{$order->user->name}}

You Order <b>#{{$order->code}}</b> is <b>{{$order->transaction->status}}</b> with transaction code <b>{{$order->transaction->code}}</b>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
