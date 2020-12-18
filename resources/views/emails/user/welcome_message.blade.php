@component('mail::message')
# Welcome
Dear {{$user->name}},
Thank you for reaching here out <3

@component('mail::button', ['url' => route('welcome')])
{{config('app.name')}}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
