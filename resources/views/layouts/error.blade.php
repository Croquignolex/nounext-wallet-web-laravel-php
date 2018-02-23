@extends('layouts.master')

@section('title')
    <title>{{ page_title($page ?? '') }}</title>
@endsection

@section('body')
    <div class="container-fluid">
        @include('partials.language.language', ['style' => 'lang'])
        <div class="row justify-content-center" style="padding-top: 50px">
            <div class="card app-main-border">
                <div class="card-header text-center app-main-bg"><h4 class=" text-uppercase">{{ config('company.name') }} <strong>{{ config('app.name')}}</strong></h4></div>
                <div class="card-body">
                    <h1 class="card-title app-main-color text-uppercase">{{ __($page) }}</h1>
                    @yield('error_title').<br />
                    @yield('error_message').<br /><br />
                    @lang('errors.return').<br />
                    <a href="{{ route_manager('home') }}" class="btn app-main-btn">
                        <span class="oi oi-home"></span>&nbsp;
                        @lang('general.home')
                    </a>
                </div>
            </div>
        </div>
        @include('partials.footer')
    </div>
@endsection

@push('style.layout')
    <link rel="stylesheet" href="{{ css_asset('auth') }}" type="text/css">
@endpush