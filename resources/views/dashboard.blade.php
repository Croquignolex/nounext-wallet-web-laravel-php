@extends('layouts.app', ['page' => 'general.dashboard', 'breadcrumb' => ['general.dashboard']])

@section('content') 
    @lang('general.dashboard')  
@endsection

@push('page')
    <script>
        window.onload = function () {
            var chart1 = document.getElementById("line-chart").getContext("2d");
            window.myLine = new Chart(chart1).Line(lineChartData, {
                responsive: true,
                scaleLineColor: "rgba(0,0,0,.2)",
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleFontColor: "#c5c7cc"
            });
        };
    </script>
    @include('partials.notification')
@endpush 