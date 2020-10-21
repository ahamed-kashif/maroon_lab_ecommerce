@component('mail::message')
# Welcome

Thank you {{$user->name}} for being with us! Checkout our cool virtual store...

@component('mail::button', ['url' => route('welcome')])
{{config('app.name')}}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
