@extends('layouts.mail.mail')

@section('body') 
    <h5 class="card-title text-dark text-uppercase">
         Bienvenu <strong class="app-main-color">{{ $user->name }}</strong> sur
        {{ strtoupper(config('app.name')) }}
    </h5>
    <p> 
        @lang('mail.mail_welcome_register').<br>
        @lang('mail.mail_confirm_register').<br><br>
    
        <a href="{{ route_manager('confirmed', ['token' => $user->token, 'email' => $user->email]) }}" target="_blank" class="btn app-main-btn">
            Confirmer
        </a>
    </p>
@endsection