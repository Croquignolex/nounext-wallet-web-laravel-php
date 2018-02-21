@extends('layouts.mail')

@section('body') 
    <h5 class="card-title text-dark text-uppercase">
        <strong class="text-success">{{ $user->name }}</strong>
    </h5>
    <p> 
        @lang('mail.mail_reset_link').<br><br>
    
        <a href="{{ route_manager('password.reset', ['token' => $user->token]) }}" target="_blank" class="btn btn-success"> 
        	@lang('mail.reset')
        </a> 
    </p>
@endsection