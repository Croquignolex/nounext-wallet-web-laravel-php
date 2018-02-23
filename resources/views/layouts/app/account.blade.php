@extends('layouts.app.app', ['page' => $page])

@section('content')
    <div class="row app-main-margin">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class=" text-uppercase">
                        <span class="oi oi-credit-card"></span>
                        @yield('header_title')
                    </h5>
                </div>
                <div class="card-body">
                    <div class="col-sm-10 col-md-8 col-lg-6 offset-sm-1 offset-md-2 offset-lg-3">
                        @yield('form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page')
    <script src="{{ js_asset('validations') }}"></script>
@endpush