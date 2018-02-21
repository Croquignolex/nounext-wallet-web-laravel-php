<ul class="list-unstyled components">
    <form role="search" method="POST" action="{{ route_manager('search') }}">
        {{ csrf_field() }}
        <div class="form-group col-12">
            <input type="text" class="form-control" placeholder="Rechercher ...">
        </div>
    </form>
    <li class="{{ active_page('dashboard') }}">
        <a href="{{ route_manager('dashboard') }}">
            <span class="oi oi-dashboard"></span>&nbsp;&nbsp;Tableau de bord
        </a>
    </li>
    <li class="{{ active_page('transactions.index') }}">
        <a href="{{ route_manager('transactions.index')}}">
            <span class="oi oi-loop-circular"></span>&nbsp;&nbsp;Transactions
        </a>
    </li>
    <li class="{{ active_page('accounts.index') }}">
        <a href="{{ route_manager('accounts.index')}}">
            <span class="oi oi-credit-card"></span>&nbsp;&nbsp;Comptes
        </a>
    </li>
    <li class="{{ active_page('configuration') }}">
        <a href="{{ route_manager('configuration') }}">
            <span class="oi oi-cog"></span>&nbsp;&nbsp;Configurations
        </a>
    </li>
</ul>

<ul class="list-unstyled off">
    <li class="active">
        <a href=""
           onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <span class="oi oi-power-standby"></span>&nbsp;&nbsp;@lang('general.sign_out')
        </a>
        <form id="logout-form" action="{{ route_manager('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
</ul>