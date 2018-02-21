@extends('layouts.master')

@section('title')
    <title>{{ page_title($page ?? '') }}</title>
@endsection

@section('body')
    @include('partials.language.language', ['style' => 'lang'])
    <div class="row justify-content-center" style="padding-top: 5%">
        <div class="card app-main-border">
            <div class="card-header text-center app-main-bg"><h4 class=" text-uppercase">{{ config('app.name')}}</h4></div>
            <div class="card-body">
                <h1 class="card-title app-main-color text-uppercase">{{ __($page) }}</h1>
                @yield('error_title').<br />
                @yield('error_message').<br /><br />
                @lang('errors.return').<br />
                <a href="{{ route_manager('home') }}" class="btn btn-default">@lang('general.home')</a>
            </div>
        </div> 
    </div>

    @include('partials.footer')
@endsection

@push('style.layout')
    <link rel="stylesheet" href="{{ css_asset('auth') }}" type="text/css">
@endpush