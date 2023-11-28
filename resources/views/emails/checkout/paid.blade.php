@component('mail::message')
# Your Transaction Has Been Confirmed

Hi,{{$checkout->user->name}}
<br> Your Transaction Has Been Confirmed,
now you can enjoy the benefits of <b>{{$checkout->camp->title}}</b>.

@components('mail::button', ['url' => route('user.dashboard')])
My Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
