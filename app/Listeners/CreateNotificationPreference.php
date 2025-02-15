<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Models\NotificationPreference;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateNotificationPreference
{

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        $user = $event->user;

        $notificationTypes = [1, 2, 3];
        $notificationChannels = [1, 2];

        foreach ($notificationTypes as $type) {
            foreach ($notificationChannels as $channel) {
                NotificationPreference::query()->create([
                    'user_id' => $user->id,
                    'notification_type_id' => $type,
                    'notification_channel_id' => $channel,
                    'is_enabled' => true,
                    'is_user_modifiable' => true,
                ]);
            }
        }
    }
}
