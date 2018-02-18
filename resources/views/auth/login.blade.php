@extends('layouts.auth', ['page' => 'Connexion'])

@section('form')
     <form role="form" method="POST" action=""> 
        {{ csrf_field() }} 
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

        <div class="form-check form-group">
            <input type="checkbox" class="form-check-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">Se rappeler de moi</label>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success btn-block" id="login">
                <span class="oi oi-lock-unlocked"></span> Connexion
            </button>
        </div>

        <div class="form-group text-center">
            Vous n'avez pas de compte? <a href="{{ route_manager('register') }}" class="btn btn-default">Créer un compte</a><br />
            <a href="{{ route_manager('password.request') }}" class="btn btn-default" >Mot de passe oublié?</a>
        </div> 
    </form> 
@endsection