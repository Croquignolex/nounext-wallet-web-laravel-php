@inject('notificationService', 'App\Services\NotificationService')
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
    <script>
        $(function () {
            $('#notifications').click(function () {
                $.ajax({
                    method: 'GET',
                    url: '{{ route_manager('viewed') }}',
                    dataType: "json"
                })
                .done(function(data) {
                    $('#notifications').html("<span class=\"badge badge-success\">0</span> " +
                        "<span class=\"oi oi-bell\"></span> ");
                })
                .fail(function(data) {});
            });
        });
    </script>
    @stack('page')
@endpush