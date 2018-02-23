@extends('layouts.auth', ['page' => 'Inscription'])

@section('form')
    <form role="form" method="POST" action="">
        {{ csrf_field() }}
        @include('partials.input', ['placeholder' => 'Nom', 'type' => 'text',
            'name' => 'name', 'id' => 'name', 'value' => old('name')])

        @include('partials.input', ['placeholder' => 'E-mail', 'type' => 'email',
            'name' => 'email', 'id' => 'email', 'value' => old('email')])

        @include('partials.input', ['placeholder' => 'Mot de passe', 'type' => 'password',
            'name' => 'password', 'id' => 'password', 'value' => old('password')])

        @include('partials.input', ['placeholder' => 'Resaisir le mot de passe', 'type' => 'password',
           'name' => 'password_confirmation', 'id' => 'password_confirmation', 'value' => old('password_confirmation')])

        @include('partials.submit', ['id' => 'register', 'icon' => 'person',
               'label' => 'Inscription'])

        <div class="form-group text-center">
            Vous avez déjà un compte? <a href="{{ route_manager('login') }}" class="btn btn-default">Connectez-vous</a>
        </div>  
    </form>
@endsection