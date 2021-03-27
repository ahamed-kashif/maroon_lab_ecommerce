@component('mail::message')
# Thank you for your order.

Dear Customer,
Yours order has been pre-confirmed.
Soon you will be contacted by us.To see your order click the button below.
@component('mail::button', ['url' => route('customer.order.show',$order->id)])
Your Order!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
