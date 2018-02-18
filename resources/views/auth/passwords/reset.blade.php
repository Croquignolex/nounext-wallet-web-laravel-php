@extends('layouts.auth', ['page' => 'Reinitialisation'])

@section('form') 
    <form role="form" method="POST" action="">
        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group"> 
            <input type="text" class="form-control" name="name" value="{{ $name ?? old('name') }}" readonly="">  
        </div>

        <div class="form-group"> 
            <input placeholder="E-mail" type="text" class="form-control" name="email" value="{{ $email ?? old('email') }}" readonly="">   
        </div>

        <div class="form-group">  
            <input placeholder="Mot de passe" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" name="password">    
            @if ($errors->has('password'))
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>
            @endif
        </div> 

        <div class="form-group">  
            <input placeholder="Mot de passe" type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" id="password_confirmation" name="password_confirmation">    
            @if ($errors->has('password_confirmation'))
                <div class="invalid-feedback">
                    {{ $errors->first('password_confirmation') }}
                </div>
            @endif
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-block" id="resetPassword">
                <span class="oi oi-reload"></span> Réinitialiser
            </button>
        </div>

        <div class="form-group text-center">
            Vous avez déjà un compte? <a href="{{ route_manager('login') }}" class="btn btn-default">Connectez-vous</a>
        </div>  
    </form> 
@endsection
