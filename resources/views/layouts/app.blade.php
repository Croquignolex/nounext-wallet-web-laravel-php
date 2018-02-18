
@extends('layouts.master')

@section('title')
    <title>{{ page_title($page ?? '') }}</title>
@endsection

@section('body')  
    @include('partials.navbar') 
    @include('partials.sidebar') 
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        @include('partials.header') 
        @yield('content')
        @include('partials.footer')
    </div><!--/.main-->
@endsection

@push('script.layout')
    <script src="{{ js_asset('chart.min') }}"></script>
    <script src="{{ js_asset('chart-data') }}"></script> 
    <script src="{{ js_asset('easypiechart') }}"></script> 
    <script src="{{ js_asset('easypiechart-data') }}"></script> 
    <script src="{{ js_asset('bootstrap-datepicker') }}"></script> 
    <script src="{{ js_asset('custom') }}"></script>  
    @stack('page') 
@endpush