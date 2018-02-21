@extends('layouts.app', ['page' => 'general.dashboard', 'breadcrumb' => ['general.dashboard']])

@section('content') 
    @lang('general.dashboard')  
@endsection

@push('page')
    @include('partials.notification')
@endpush 