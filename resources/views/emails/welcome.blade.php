@component('mail::message')
# Hi {{ $firstName }}!
Your account in {{ config('app.name') }} has been created.

Please set your password:
@component('mail::button', ['url' => route('password.reset', ['token' => $token, 'email' => $email])])
Set Password
@endcomponent

Regards,<br>
{{ config('app.name') }}

@slot('subcopy')
If you're having trouble clicking the "Set password" button, copy and paste the URL below into your web browser:
<a href="{{ route('password.reset', ['token' => $token, 'email' => $email]) }}" class="break-all" target="_blank" rel="noopener">{{ route('password.reset', ['token' => $token, 'email' => $email]) }}</a>
@endslot

@endcomponent