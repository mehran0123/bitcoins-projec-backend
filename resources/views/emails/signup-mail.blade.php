@component('mail::message')
@lang('translation.welcome') {{  $details['username'] }}

@lang('translation.joining_email_text')

@php
$url = url('/login') .'/'. $details['token'];
@endphp


@component('mail::button', ['url' => $url])
@lang('translation.confirm_account')
@endcomponent


@lang('translation.thanks'),<br>
{{ config('app.name') }}
@endcomponent
