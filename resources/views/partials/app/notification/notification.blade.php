@inject('notificationService', 'App\Services\NotificationService')

<div class="dropdown">
    <button type="button" class="btn dropdown-toggle app-main-color app-main-dropdown" id="notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <span class="badge badge-{{ $notificationService->getBadgeColor() }}">{{ $notificationService->getNotificationsNumber() }}</span>
        <span class="oi oi-bell"></span>
    </button>
    <div class="dropdown-menu" aria-labelledby="notifications">
        <div class="dropdown-header font-weight-bold app-main-color">Notification(s)</div>
        @each('partials.app.notification.notification-item', $notificationService->getNotifications(), 'notification')
        <a class="dropdown-item app-main-dropdown-item text-center app-main-border-top" href="{{ route_manager('notifications.index') }}">
            Voir toutes les notifications
        </a>
    </div>
</div>

{{--TODO: modifier le statut de la notification des qu'on l'a vue--}}