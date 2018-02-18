<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">{{ title_case(Auth::user()->name) }}</div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <form role="search" method="POST" action="{{ route_manager('search') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Rechercher ...">
        </div>
    </form> 
    @include('partials.sidebar-menu')
</div><!--/.sidebar-->