<div class="dropdown">
    <button type="button" class="btn btn-light dropdown-toggle" id="notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <span class="oi oi-bell"></span>
    </button>
    <div class="dropdown-menu" aria-labelledby="notifications">
        <div class="dropdown-header font-weight-bold">Notification(s)</div>
        @each('partials.app.notification.notification-item', [1, 2], 'notification')
    </div>
</div>