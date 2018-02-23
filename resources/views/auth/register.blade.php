@extends('layouts.auth', ['page' => 'Inscription'])

@section('form')
    <form role="form" method="POST" action="">
        {{ csrf_field() }} 
        <div class="form-group"> 
            <input placeholder="Nom" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" value="{{ old('name') }}">   
            @if ($errors->has('name'))
                <div class="invalid-feedback">
                  {{ $errors->first('name') }}
                </div> 
            @endif 
        </div>

        <div class="form-group"> 
            <input placeholder="E-mail" type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}">   
            @if ($errors->has('email'))
                <div class="invalid-feedback">
                  {{ $errors->first('email') }}
                </div> 
            @endif 
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
            <button type="submit" class="btn app-main-btn btn-block" id="register">
                <span class="oi oi-person"></span>&nbsp;
                Inscription
            </button>
        </div>

        <div class="form-group text-center">
            Vous avez déjà un compte? <a href="{{ route_manager('login') }}" class="btn btn-default">Connectez-vous</a>
        </div>  
    </form>
@endsection