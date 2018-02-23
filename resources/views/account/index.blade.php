@extends('layouts.app.app', ['page' => 'Comptes'])

@section('content')
    <div class="row app-main-margin">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class=" text-uppercase">
                        <span class="oi oi-credit-card"></span>
                        Comptes
                    </h5>
                </div>
                <div class="card-body form-inline">
                    <div class="col-sm-5">
                        <a href="{{ route_manager('accounts.create') }}" class="btn app-main-btn">
                            <span class="oi oi-plus"></span>&nbsp;
                            Ajouter un compte
                        </a><br>
                        <small class="app-main-color">{{ $paginationTools->itemsNumber }} Comptes au total</small>
                    </div>
                    <div class="col-sm-7">
                        @include('partials.app.pagination', ['url' => route_manager('accounts.index') . '?page='])
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row app-main-margin">
        @forelse ($paginationTools->displayItems as $account)
            <div class="col-md-6 col-lg-4 app-main-margin">
                <div class="card">
                    <div class="card-header {{ $account->color }}">
                        <strong class="text-uppercase {{ $account->color == 'bg-light' ? 'text-dark' : 'text-white' }}">{{ $account->name }}</strong>
                    </div>
                    <div class="card-body">
                        <p>{{ $account->description }}</p>
                        <p class="text-right">
                            <a href="{{ route_manager('accounts.edit', ['account' => $account]) }}" class="btn btn-warning text-white" title="Modifier">
                                <span class="oi oi-pencil"></span>
                            </a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal-{{ $account->id }}" title="Supprimer">
                                <span class="oi oi-x"></span>
                            </button>
                            <a href="{{ route_manager('accounts.show', ['account' => $account]) }}" class="btn btn-info" title="Transactions">
                                <span class="oi oi-eye"></span>
                            </a>
                        </p>
                    </div>
                    <div class="card-footer text-right {{ $account->color }} {{ $account->color == 'bg-light' ? 'text-dark' : 'text-white' }}">
                        Solde: <strong>{{ $account->amount }}</strong> FCFA
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-white">
                <div class="alert bg-secondary" role="alert">
                    <span class="oi oi-warning"></span>&nbsp;
                    Pas de compte pour le moment
                </div>
            </div>
        @endforelse
    </div><!-- /.row -->

    @foreach ($paginationTools->displayItems as $account)
        <!-- Delete modal -->
        <div class="modal fade" id="delete-modal-{{ $account->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-{{ $account->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel-{{ $account->id }}">
                            Supprimer le compte <strong>{{ $account->name }}</strong>.
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body {{ $account->color }} {{ $account->color == 'bg-light' ? 'text-dark' : 'text-white' }}">
                        A la suppression de <em>{{ $account->name }}</em>,
                        toutes les transactions et données liées à ce compte seront perdus,
                        êtes vous sûr?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            <span class="oi oi-thumb-down"></span>&nbsp;
                            Non
                        </button>
                        <button type="button" class="btn {{ $account->color }} {{ $account->color == 'bg-light' ? 'text-dark' : 'text-white' }}"  onclick="document.getElementById('delete-form-{{ $account->id }}').submit();">
                            <span class="oi oi-thumb-up"></span>&nbsp;
                            Oui
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <form id="delete-form-{{ $account->id }}" action="{{ route_manager('accounts.destroy', ['account' => $account]) }}" method="POST" class="hidden">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
        </form>
    @endforeach
@endsection

@push('page')
    @include('partials.popup-alert')
@endpush