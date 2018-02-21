@extends('layouts.error', ['page' => 'errors.500'])

@section('error_title')
    @lang('errors.500_title')
@endsection

@section('error_message')
    @lang('errors.500_message')
@endsection
