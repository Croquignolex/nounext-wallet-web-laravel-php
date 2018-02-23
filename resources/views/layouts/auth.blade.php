@extends('layouts.master')

@section('title')
    <title>{{ page_title($page ?? '') }}</title>
@endsection

@section('body')
    @include('partials.language.language', ['style' => 'lang dropleft'])
    <div class="row justify-content-center" style="padding-top: 5%">
        <div class="card app-main-border">
            <div class="card-header text-center app-main-bg"><h4 class=" text-uppercase">{{ config('company.name') }} <strong>{{ config('app.name')}}</strong></h4></div>
            <div class="card-body">
                <h5 class="card-title app-main-color text-uppercase">{{ $page }}</h5>
                @yield('form')
            </div>
        </div> 
    </div>

    @include('partials.footer')
@endsection

@push('style.layout')
    <link rel="stylesheet" href="{{ css_asset('auth') }}" type="text/css">
@endpush
   
@push('script.layout')
    <script src="{{ js_asset('validations') }}"></script> 
    @include('partials.popup-alert')
@endpush