<nav class="navbar navbar-default">
    <div class="navbar-header">
        <button type="button" id="sidebarCollapse" class="navbar-toggler app-main-border">
            <span class="app-main-bg"></span>
            <span class="app-main-bg"></span>
            <span class="app-main-bg"></span>
        </button>
    </div>

    <div class="form-inline">
        <div class="h4 app-main-color font-weight-bold">
            <a href="{{ route_manager('configuration') }}">{{ title_case(Auth::user()->name) }}</a>
        </div>
        &nbsp;&nbsp;&nbsp;
        @include('partials.app.notification.notification')
        &nbsp;&nbsp;&nbsp;
        @include('partials.language.language')
        &nbsp;&nbsp;&nbsp;
    </div>
</nav>