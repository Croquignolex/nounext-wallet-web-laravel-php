@extends('layouts.app', ['page' => 'general.dashboard'])

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @lang('general.dashboard')
        </div>
    </div>
@endsection

@push('page')
    @include('partials.popup-alert')
@endpush 