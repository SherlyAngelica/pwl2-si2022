@component('mail::message')
# Welcome!

Hi, {{$user->name}}
<br> Welcome to PWL2
your account has been created successfully
Now you can choose your best camp!

@component('mail::button', [url => route("login")])
Login Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent   
