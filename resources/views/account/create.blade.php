@extends('layouts.app', ['page' => 'Nouveau compte', 'breadcrumb' => ['Comptes', 'Nouveau compte']])

@section('content') 
    <div class="row text-center">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-default"> 
                <div class="panel-heading">Nouveau compte</div>
                <div class="panel-body">  
                    <form role="form" method="POST" action="{{ route_manager('accounts.store') }}">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                                <input placeholder="Nom" type="text" class="form-control" id="name" name="name" aria-describedby="email_error" value="{{ old('name') }}">   
                                <span class="form-control-feedback icon" aria-hidden="true"></span> 
                                @if ($errors->has('name'))
                                    <span id="email_error" class="help-block">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
                            </div> 

                            <div class="form-group has-feedback {{ $errors->has('description') ? 'has-error' : '' }}">
                                <input placeholder="Description" type="text" class="form-control" id="description" name="description" aria-describedby="email_error" value="{{ old('description') }}">   
                                <span class="form-control-feedback icon" aria-hidden="true"></span> 
                                @if ($errors->has('description'))
                                    <span id="email_error" class="help-block">
                                        {{ $errors->first('description') }}
                                    </span>
                                @endif
                            </div>  
 
                            <div class="form-group has-feedback {{ $errors->has('amount') ? 'has-error' : '' }}">
                                <input placeholder="Montant initial" type="number" class="form-control" id="amount" name="amount" aria-describedby="email_error" value="{{ old('amount') }}">   
                                <span class="form-control-feedback icon" aria-hidden="true"></span> 
                                @if ($errors->has('amount'))
                                    <span id="email_error" class="help-block">
                                        {{ $errors->first('amount') }}
                                    </span>
                                @endif
                            </div>  

                            <div class="form-group"> 
                                <label class="radio-inline">
                                    <input type="radio" name="color" value="default" checked><span class="label label-default">Blanc</span>
                                </label>  
                                <label class="radio-inline">
                                    <input type="radio" name="color" value="success"><span class="label label-success">Vert</span>
                                </label> 
                                <label class="radio-inline">
                                    <input type="radio" name="color" value="info"><span class="label label-info">Violet</span>
                                </label> 
                                <label class="radio-inline">
                                    <input type="radio" name="color" value="warning"><span class="label label-warning">Jaune</span>
                                </label> 
                                <label class="radio-inline">
                                    <input type="radio" name="color" value="danger"><span class="label label-danger">Rouge</span>
                                </label>
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary" id="add_account">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    Ajouter
                                </button>  
                            </div> 
                        </fieldset>
                    </form> 
                </div>
            </div><!-- /.panel-->
        </div>
    </div>
@endsection

@push('page')
    <script src="{{ js_asset('validations') }}"></script>
@endpush 