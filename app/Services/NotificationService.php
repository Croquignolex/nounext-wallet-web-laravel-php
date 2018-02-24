<?php

namespace App\Services;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class NotificationService
{
    private $notificationsNumber;
    private $notifications;

    /**
     * LanguageService constructor.
     */
    public function __construct()
    {
        $this->notifications = User::find(Auth::user()->id)->notifications->sortByDesc('updated_at');
        $this->notificationsNumber = $this->notifications->count();
    }

    public function getNotificationsNumber()
    {
        return $this->notificationsNumber;
    }

    public function getNotifications()
    {
        return $this->notifications;
    }

    public function getBadgeColor()
    {
        if($this->notificationsNumber == 0)
            return 'success';
        else return 'danger';
    }
}