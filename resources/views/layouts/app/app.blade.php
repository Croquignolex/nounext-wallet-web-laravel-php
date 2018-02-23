
@extends('layouts.master')

@section('title')
    <title>{{ page_title($page ?? '') }}</title>
@endsection

@section('body')
    <div class="wrapper">
        <!-- Sidebar Holder -->
        @include('partials.app.sidebar.sidebar')

        <!-- Page Content Holder -->
        <div id="content" class="container">
            @include('partials.app.navbar')
            @yield('content')
            @include('partials.footer')
        </div>
    </div>
@endsection

@push('style.layout')
    <link rel="stylesheet" href="{{ css_asset('app') }}" type="text/css">
@endpush

@push('script.layout')
    <script src="{{ js_asset('app') }}"></script>
    @stack('page')
@endpush