<?php

namespace App\Notifications;

use Kaveh\NotificationService\Notifications\BaseNotification;
use Illuminate\Notifications\Messages\MailMessage;

class TicketCreateNotification extends BaseNotification
{


    public function __construct(array $channels, array $data)
    {
        parent::__construct($channels);
        $this->data = $data;
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject($this->data['ticket']->title)
            ->line('تیکت شما با موفقیت ثبت شد')
            ->line('ما مشکل شما را دریافت کردیم، کارشناسان به زودی پاسخ مشکل شما را میدهند');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'تیکت شما با موفقیت ثبت شد'
        ];
    }
}
