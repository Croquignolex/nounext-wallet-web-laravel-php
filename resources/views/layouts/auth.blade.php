@extends('layouts.master')

@section('title')
    <title>{{ page_title($page ?? '') }}</title>
@endsection

@section('body') 
    <div class="row justify-content-center" style="padding-top: 5%">
        <div class="card border-success">
            <div class="card-header text-center text-white bg-success"><h4 class=" text-uppercase">{{ config('app.name')}}</h4></div>
            <div class="card-body">
                <h5 class="card-title text-success text-uppercase">{{ $page }}</h5>
                @yield('form')
            </div>
        </div> 
    </div> 

    <div class="row text-muted text-center justify-content-center">
        @include('partials.footer')
    </div>
@endsection
   
@push('script.layout')
    <script src="{{ js_asset('validations') }}"></script> 
    @include('partials.notification') 
@endpush