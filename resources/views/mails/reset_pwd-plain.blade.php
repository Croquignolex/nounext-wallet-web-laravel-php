@extends('layouts.mail-plain')

@section('body')
	<p>
		<h5>
			<strong>{{ $user->name }}</strong>
		</h5><br>
		@lang('mail.mail_reset_link').<br>
		<a href="{{ route_manager('password.reset', ['token' => $user->token]) }}" target="_blank">
			@lang('mail.mail_reset_link')
		</a><br><br><br>
		&copy; 2018 <a href="{{ config('company.web_site') }}">{{ config('company.name') }}</a> @lang('general.right').
	</p>
@endsection