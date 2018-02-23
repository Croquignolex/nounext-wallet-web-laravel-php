@extends('layouts.app.account', ['page' => 'Modification du compte'])

@section('header_title', 'Modification du compte')

@section('form')
    <form role="form" method="POST" action="{{ route_manager('accounts.update', ['account' => $account]) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        @include('partials.input', ['placeholder' => 'Nom', 'type' => 'text',
            'name' => 'name', 'id' => 'name', 'value' => $account->name ?? old('name')])

        @include('partials.input', ['placeholder' => 'Description', 'type' => 'text',
            'name' => 'description', 'id' => 'description', 'value' => $account->description ?? old('description')])

        @include('partials.input', ['placeholder' => 'Montant initial', 'type' => 'number',
            'name' => 'amount', 'id' => 'amount', 'value' => $account->amount ?? old('amount')])

        <div class="form-group text-center">
            @include('partials.radio', ['name' => 'color', 'value' => 'bg-light', 'badge' => 'badge-light',
            'label' => 'Blanc', 'check' =>  $account->color == 'bg-light' ? 'checked' : ''])

            @include('partials.radio', ['name' => 'color', 'value' => 'bg-success', 'badge' => 'badge-success',
                'label' => 'Vert', 'check' =>  $account->color == 'bg-success' ? 'checked' : ''])

            @include('partials.radio', ['name' => 'color', 'value' => 'app-main-bg', 'badge' => 'app-main-bg',
                'label' => 'Violet', 'check' =>  $account->color == 'app-main-bg' ? 'checked' : ''])

            @include('partials.radio', ['name' => 'color', 'value' => 'bg-warning', 'badge' => 'badge-warning text-white',
                'label' => 'Jaune', 'check' =>  $account->color == 'bg-warning' ? 'checked' : ''])
        </div>

        <div class="form-group text-center">
            @include('partials.radio', ['name' => 'color', 'value' => 'bg-danger', 'badge' => 'badge-danger',
                'label' => 'Rouge', 'check' =>  $account->color == 'bg-danger' ? 'checked' : ''])

            @include('partials.radio', ['name' => 'color', 'value' => 'bg-info', 'badge' => 'badge-info',
                'label' => 'Aqua', 'check' =>  $account->color == 'bg-info' ? 'checked' : ''])

            @include('partials.radio', ['name' => 'color', 'value' => 'bg-secondary', 'badge' => 'badge-secondary',
                'label' => 'Gris', 'check' =>  $account->color == 'bg-secondary' ? 'checked' : ''])

            @include('partials.radio', ['name' => 'color', 'value' => 'bg-dark', 'badge' => 'badge-dark',
                'label' => 'Noir', 'check' =>  $account->color == 'bg-dark' ? 'checked' : ''])
        </div>

        @include('partials.submit', ['id' => 'update_account', 'icon' => 'task',
                'label' => 'Modifier'])
    </form>
@endsection