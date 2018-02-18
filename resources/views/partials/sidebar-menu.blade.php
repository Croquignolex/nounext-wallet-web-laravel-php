<ul class="nav menu">
    <li class="{{ active_page('dashboard') }}">
        <a href="{{ route_manager('dashboard') }}">
            <em class="fa fa-pie-chart">&nbsp;</em> Dashboard
        </a>
    </li>
    <li class="{{ active_page('transactions.index') }}"> 
        <a href="{{ route_manager('accounts.index')}}">
            <em class="fa fa-list">&nbsp;</em> Transactions
        </a>
    </li> 
    <li class="{{ active_page('accounts.index') }}">
        <a href="{{ route_manager('accounts.index')}}">
            <em class="fa fa-usd">&nbsp;</em> Comptes
        </a>
    </li>
    <li class="{{ active_page('configuration') }}">
        <a href="{{ route_manager('configuration') }}">
            <em class="fa fa-cogs">&nbsp;</em> Configurations
        </a>
    </li>
    <li>
        <a href=""
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <em class="fa fa-power-off">&nbsp;</em>@lang('general.sign_out')
        </a>
        <form id="logout-form" action="{{ route_manager('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form> 
    </li> 
</ul>