@extends('layouts.auth', ['page' => 'Reinitialisation'])

@section('form')
    <form role="form" method="POST" action="{{ route_manager('password.email') }}">
        {{ csrf_field() }}
        @include('partials.input', ['placeholder' => 'E-mail', 'type' => 'email',
           'name' => 'email', 'id' => 'email', 'value' => old('email')])

        @include('partials.submit', ['id' => 'sendLink', 'icon' => 'location',
               'label' => 'Envoyer le lien'])

        <div class="form-group text-center">
            Vous n'avez pas de compte? <a href="{{ route_manager('register') }}" class="btn btn-default">Créer un compte</a><br />
            <a href="{{ route_manager('login') }}" class="btn btn-default">
                Connectez-vous
            </a>
        </div> 
    </form>
@endsection 