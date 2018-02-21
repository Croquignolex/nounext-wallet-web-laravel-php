@extends('layouts.app', ['page' => 'Comptes'])

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default"> 
                <div class="panel-heading">Comptes ({{ $accounts->count() }})</div>
                <div class="panel-body">
                    <div class="col-md-12">  
                        <a href="{{ route_manager('accounts.create') }}" class="btn btn-primary">
                            <em class="fa fa-plus">&nbsp;</em>
                            Ajouter un compte
                        </a> 
                    </div>
                </div>
            </div><!-- /.panel-->
        </div>
    </div>

    <div class="row"> 
        <div class="col-lg-12">
            @forelse ($accounts as $account) 
                <div class="col-md-6 col-lg-4">
                    <div class="panel panel-{{ $account->color }}">
                        <div class="panel-heading overflow">{{ $account->name }}</div>
                        <div class="panel-body">
                            <p>{{ $account->description }}</p>
                            <p class="text-right">
                                <a href="{{ route_manager('accounts.edit', ['account' => $account]) }}" class="btn btn-warning" title="Modifier">
                                    <em class="fa fa-edit"></em> 
                                </a> 
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal-{{ $account->id }}" title="Supprimer">
                                  <em class="fa fa-remove"></em> 
                                </button> 
                                <a href="{{ route_manager('accounts.show', ['account' => $account]) }}" class="btn btn-default" title="Transactions">
                                    <em class="fa fa-list"></em> 
                                </a>
                            </p>
                        </div>
                        <div class="panel-footer text-right">
                            Solde: <strong>{{ $account->amount }}</strong> FCFA 
                        </div>
                    </div>
                </div>
            @empty    
                <div class="alert bg-info" role="alert">
                    <em class="fa fa-lg fa-warning">&nbsp;</em> 
                    Pas de compte pour le moment
                </div>     
            @endforelse
        </div> 
    </div><!-- /.row --> 

    @foreach ($accounts as $account)
        <!-- Delete modal -->
        <div class="modal fade" id="delete-modal-{{ $account->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    Supprimer le compte <strong>{{ $account->name }}</strong>.
                </h4>
              </div>
              <div class="modal-body bg-{{ $account->color }}">
                A la suppression de <em>{{ $account->name }}</em>, toutes les transactions et données liées à ce compte seront perdus, êtes vous sûr?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <em class="fa fa-remove">&nbsp;</em>
                    Non
                </button>
                <button type="button" class="btn btn-{{ $account->color }}"  onclick="document.getElementById('delete-form-{{ $account->id }}').submit();">
                    <em class="fa fa-check">&nbsp;</em>
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