@extends('layouts.error', ['page' => 'errors.404'])

@section('error_title')
    @lang('errors.404_title')
@endsection

@section('error_message')
    @lang('errors.404_message')
@endsection