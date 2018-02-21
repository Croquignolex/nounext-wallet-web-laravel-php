@extends('layouts.error', ['page' => 'errors.503'])

@section('error_title')
    @lang('errors.503_title')
@endsection

@section('error_message')
    @lang('errors.503_message')
@endsection