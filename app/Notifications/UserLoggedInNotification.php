<?php

namespace App\Notifications;

use Kaveh\NotificationService\Notifications\BaseNotification;
use Illuminate\Notifications\Messages\MailMessage;

class UserLoggedInNotification extends BaseNotification
{
    public function __construct(array $channels, array $data)
    {
        parent::__construct($channels);
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('ورود به حساب کاربری')
            ->line('کاربرگرامی،')
            ->line('شما وارد پنل خود شده اید');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'کاربرگرامی، شما وارد پنل خود شده اید'
        ];
    }
}
