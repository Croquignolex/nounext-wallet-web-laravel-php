@extends('layouts.auth', ['page' => 'Confirmation'])

@section('form')  
	<div class="alert alert-{{ session('notification.type') }}">
	    <strong>
	    	<span class="{{ session('notification.icon') }}" aria-hidden="true"></span>
	    	{{ title_case(session('notification.title')) }}
		</strong><br>
	    {{ session('notification.message') }}
	</div>

    <div class="form-group text-center"> 
        <a href="{{ route_manager('login') }}" class="btn app-main-bg">Connectez-vous</a>
    </div>  
    {{ session()->flush() }}
@endsection 