@extends('layouts.mail')

@section('body') 
    <h5 class="card-title text-dark text-uppercase">
         Bienvenu <strong class="text-success">{{ $user->name }}</strong> sur 
        {{ strtoupper(config('app.name')) }}
    </h5>
    <p> 
        @lang('mail.mail_welcome_register').<br>
        @lang('mail.mail_confirm_register').<br><br>
    
        <a href="{{ route_manager('confirmed', ['token' => $user->token, 'email' => $user->email]) }}" target="_blank" class="btn btn-success"> 
            Confirmer
        </a>
    </p>
@endsection