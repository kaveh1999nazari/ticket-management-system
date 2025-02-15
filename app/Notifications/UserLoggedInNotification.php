<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;

class UserLoggedInNotification extends BaseNotification
{

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('ورود به حساب کاربری')
                    ->line('کاربرگرامی،')
                    ->line('شما وارد پنل خود شده اید');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'کاربرگرامی، شما وارد پنل خود شده اید'
        ];
    }
}
