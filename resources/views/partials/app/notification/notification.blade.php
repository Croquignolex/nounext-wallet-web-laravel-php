<div class="dropdown">
    <button type="button" class="btn dropdown-toggle app-main-color app-main-dropdown" id="notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <span class="badge badge-success">0</span>
        <span class="oi oi-bell"></span>
    </button>
    <div class="dropdown-menu" aria-labelledby="notifications">
        <div class="dropdown-header font-weight-bold app-main-color">Notification(s)</div>
        @each('partials.app.notification.notification-item', [1, 2], 'notification')
    </div>
</div>