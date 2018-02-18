<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button> 
            <a class="navbar-brand" href="{{ route_manager('dashboard') }}">
                <span>{{ config('company.name')}}</span> {{ config('app.name')}}
            </a>
 
            <ul class="nav navbar-top-links navbar-right">
                @include('partials.badge-message')
                @include('partials.badge-notification') 
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>