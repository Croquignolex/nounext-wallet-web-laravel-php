@extends('layouts.app.account', ['page' => 'Nouveau compte'])

@section('header_title', 'Nouveau compte')

@section('form')
    <form role="form" method="POST" action="{{ route_manager('accounts.store') }}">
        {{ csrf_field() }}
        @include('partials.input', ['placeholder' => 'Nom', 'type' => 'text',
            'name' => 'name', 'id' => 'name', 'value' => old('name')])

        @include('partials.input', ['placeholder' => 'Description', 'type' => 'text',
            'name' => 'description', 'id' => 'description', 'value' => old('description')])

        @include('partials.input', ['placeholder' => 'Montant initial', 'type' => 'number',
            'name' => 'amount', 'id' => 'amount', 'value' => old('amount')])

        <div class="form-group text-center">
            @include('partials.radio', ['name' => 'color', 'value' => 'bg-light',
                'badge' => 'badge-light', 'label' => 'Blanc', 'check' => 'checked'])

            @include('partials.radio', ['name' => 'color', 'value' => 'bg-success',
                'badge' => 'badge-success', 'label' => 'Vert'])

            @include('partials.radio', ['name' => 'color', 'value' => 'app-main-bg',
                'badge' => 'app-main-bg', 'label' => 'Violet'])

            @include('partials.radio', ['name' => 'color', 'value' => 'bg-warning',
                'badge' => 'badge-warning text-white', 'label' => 'Jaune'])
        </div>

        <div class="form-group text-center">
            @include('partials.radio', ['name' => 'color', 'value' => 'bg-danger',
                'badge' => 'badge-danger', 'label' => 'Rouge'])

            @include('partials.radio', ['name' => 'color', 'value' => 'bg-info',
                'badge' => 'badge-info', 'label' => 'Aqua'])

            @include('partials.radio', ['name' => 'color', 'value' => 'bg-secondary',
                'badge' => 'badge-secondary', 'label' => 'Gris'])

            @include('partials.radio', ['name' => 'color', 'value' => 'bg-dark',
                'badge' => 'badge-dark', 'label' => 'Noir'])
        </div>

        @include('partials.submit', ['id' => 'add_account', 'icon' => 'plus',
                'label' => 'Ajouter'])
    </form>
@endsection