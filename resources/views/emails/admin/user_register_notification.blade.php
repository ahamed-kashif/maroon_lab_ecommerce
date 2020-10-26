@component('mail::message')
# Hello

A new user just registered.<br>
Customer name: {{$user->name}}<br>
Mobile Number: {{$user->mobile_number}}<br>
Email Address: {{$user->email}}<br>

Now we have total {{$totalUsers}} users! Checkout updated users list..

@component('mail::button', ['url' => route('user.list')])
users list
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
