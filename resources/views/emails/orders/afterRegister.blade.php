@component('mail::message')
# Selaamt Datang

Hallo {{ $user->name }}, selamat daang di forum alfatih

@component('mail::button', ['url' => route('login')])
Login Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
