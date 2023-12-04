@component('mail::message')
# Register Camp: {{$checkout->camp->title}}

Hi, {{$checkout->user->name}}
<br> Thankyou for register in <b> {{$checkout->camp->title}} </b>
Please see payment instruction by clicking the button below

@component('mail::button', ['url' => route("user.checkout.invoice", $checkout->id)])
Login Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
