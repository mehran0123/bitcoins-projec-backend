@component('mail::message')
@lang('translation.hi') {{  $details['username'] }}

@lang('translation.reset_email_narration')

@php
$url = url('/admin/reset-password') .'/'. $details['token'];
@endphp

@component('mail::button', ['url' => $url])
@lang('translation.reset_password')
@endcomponent

@lang('translation.thanks')<br>
{{ config('app.name') }}
@endcomponent
