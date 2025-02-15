<?php

namespace App\Service;

use App\Exceptions\NotFoundNotificationType;
use App\Models\NotificationChannel;
use App\Models\NotificationPreference;
use App\Models\NotificationType;
use App\Models\User;

class NotificationService
{
    public static function sendNotification(string $notificationClass, User $user, int $typeId, ?string $message = null): void
    {
        $notificationType = NotificationType::query()
            ->where('id', $typeId)
            ->first();
        if(! $notificationType) {
            throw new NotFoundNotificationType();
        }

        $activeChannels = NotificationPreference::query()
            ->where('user_id', $user->id)
            ->where('notification_type_id', $notificationType->id)
            ->where('is_enabled', true)
            ->pluck('notification_channel_id')
            ->toArray();

        if (empty($activeChannels)) {
            return;
        }

        $channels = NotificationChannel::query()
            ->whereIn('id', $activeChannels)
            ->pluck('name')
            ->toArray();

        $user->notify(new $notificationClass($channels, $message ?? $notificationType->name));
    }
}
