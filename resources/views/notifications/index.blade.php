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
                    <div class="col-12 justify-content-end">
                        @include('partials.app.pagination', ['url' => route_manager('notifications.index') . '?page='])
                    </div>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Détails</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($paginationTools->displayItems as $notification)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td scope="row" class="text-{{ $notification->color }}">
                                        <span class="oi oi-{{ $notification->icon }}"></span> {{ $notification->title }}
                                    </td>
                                    <td scope="row">{{ $notification->details }}</td>
                                    <td scope="row">{{ $notification->date }}</td>
                                    <td scope="row" class="text-center">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal-{{ $notification->id }}" title="Supprimer">
                                            <span class="oi oi-x"></span>
                                        </button>
                                        <a href="{{ $notification->url }}" class="btn btn-info" title="Détails du compte">
                                            <span class="oi oi-eye"></span>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <div class="col-12 text-white">
                                            <div class="alert bg-secondary" role="alert">
                                                <span class="oi oi-warning"></span>&nbsp;
                                                Pas de notification pour le moment
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @foreach ($paginationTools->displayItems as $notification)
        <!-- Delete modal -->
        <div class="modal fade" id="delete-modal-{{ $notification->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-{{ $notification->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel-{{ $notification->id }}">
                            Supprimer cette notification.
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body bg-{{ $notification->color }} {{ $notification->color == 'bg-light' ? 'text-dark' : 'text-white' }}">
                        Vous ne pourrez plus consulter cette notification,
                        êtes vous sûr?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            <span class="oi oi-thumb-down"></span>&nbsp;
                            Non
                        </button>
                        <button type="button" class="btn btn-{{ $notification->color }} {{ $notification->color == 'bg-light' ? 'text-dark' : 'text-white' }}"  onclick="document.getElementById('delete-notification-{{ $notification->id }}').submit();">
                            <span class="oi oi-thumb-up"></span>&nbsp;
                            Oui
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <form id="delete-notification-{{ $notification->id }}" action="{{ route_manager('notifications.destroy', [$notification]) }}" method="POST" class="hidden">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
        </form>
    @endforeach
@endsection

@push('page')
    @include('partials.popup-alert')
@endpush