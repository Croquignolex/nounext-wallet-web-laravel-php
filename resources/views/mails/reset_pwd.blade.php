@extends('layouts.mail.mail')

@section('body') 
    <h5 class="card-title text-dark text-uppercase">
        <strong class="app-main-color">{{ $user->name }}</strong>
    </h5>
    <p> 
        @lang('mail.mail_reset_link').<br><br>
    
        <a href="{{ route_manager('password.reset', ['token' => $user->token]) }}" target="_blank" class="btn app-main-btn">
        	@lang('mail.reset')
        </a> 
    </p>
@endsection