<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Notification;

class ActivityNotification extends Notification
{
    public function __construct(
        private readonly string $message,
        private readonly ?string $url = null,
    ) {
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): DatabaseMessage
    {
        return new DatabaseMessage([
            'message' => $this->message,
            'url' => $this->url,
        ]);
    }
}
