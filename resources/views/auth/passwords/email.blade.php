@extends('layouts.auth', ['page' => 'Reinitialisation'])

@section('form')
    <form role="form" method="POST" action="{{ route_manager('password.email') }}">
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
            <button type="submit" class="btn app-main-bg btn-block" id="sendLink">
                <span class="oi oi-location"></span> Envoyer le lien
            </button>
        </div>

        <div class="form-group text-center">
            Vous n'avez pas de compte? <a href="{{ route_manager('register') }}" class="btn btn-default">Créer un compte</a><br />
            <a href="{{ route_manager('login') }}" class="btn btn-default">
                Connectez-vous
            </a>
        </div> 
    </form>
@endsection 