@extends('layouts.app.app', ['page' => 'Notifications'])

@section('content')
    <div class="row app-main-margin">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class=" text-uppercase">
                        <span class="oi oi-bell"></span>
                        Notifications
                    </h5>
                </div>
                <div class="card-body form-inline">
                    @forelse ($paginationTools->displayItems as $notification)
                        la nitif
                    @empty
                        <div class="col-12 text-white">
                            <div class="alert bg-secondary" role="alert">
                                <span class="oi oi-warning"></span>&nbsp;
                                Pas de notification pour le moment
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page')
    @include('partials.popup-alert')
@endpush

{{--TODO: Liste des notifications et marquer vue--}}