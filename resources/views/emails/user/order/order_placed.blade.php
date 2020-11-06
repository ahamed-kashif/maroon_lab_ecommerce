@component('mail::message')
# Thank you for your order.

Soon you will be contacted by us.To see your order click the button below.
@component('mail::button', ['url' => route('order.customer.show',$order->id)])
Your Order!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
