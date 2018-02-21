@extends('layouts.mail-plain')

@section('body')
    <p>
        <h5>
            @lang('mail.welcome') <strong>{{ $user->name }}</strong> @lang('mail.on') {{ strtoupper(config('app.name')) }}
        </h5><br>
        @lang('mail.mail_welcome_register').<br>
        @lang('mail.mail_confirm_register').<br>
        <a href="{{ route_manager('confirmed', ['token' => $user->token, 'email' => $user->email]) }}" target="_blank">
            Confirmer
        </a><br><br><br>
        &copy; 2018 <a href="{{ config('company.web_site') }}">{{ config('company.name') }}</a> @lang('general.right').
    </p>
@endsection