@extends('layouts.auth', ['page' => 'Connexion'])

@section('form')
     <form role="form" method="POST" action=""> 
        {{ csrf_field() }}
         @include('partials.input', ['placeholder' => 'E-mail', 'type' => 'email',
             'name' => 'email', 'id' => 'email', 'value' => old('email')])

         @include('partials.input', ['placeholder' => 'Mot de passe', 'type' => 'password',
             'name' => 'password', 'id' => 'password', 'value' => old('password')])

        <div class="form-check form-group">
            <input type="checkbox" class="form-check-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">Se rappeler de moi</label>
        </div>

         @include('partials.submit', ['id' => 'login', 'icon' => 'lock-unlocked',
               'label' => 'Connexion'])

        <div class="form-group text-center">
            Vous n'avez pas de compte? <a href="{{ route_manager('register') }}" class="btn btn-default">Créer un compte</a><br />
            <a href="{{ route_manager('password.request') }}" class="btn btn-default" >Mot de passe oublié?</a>
        </div> 
    </form> 
@endsection