<nav id="sidebar" class="app-main-bg">
    <div class="sidebar-header">
        <h3>{{ strtoupper(config('app.name')) }}</h3>
    </div>

    @include('partials.app.sidebar.sidebar-menu')
</nav>