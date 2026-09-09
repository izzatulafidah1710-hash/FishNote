<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PromotionDeletedNotification extends Notification
{
    use Queueable;

    public $judul_promosi;

    /**
     * Create a new notification instance.
     */
    public function __construct($judul_promosi)
    {
        $this->judul_promosi = $judul_promosi;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'warning',
            'title' => 'Promosi Dihapus',
            'message' => 'Promosi Anda yang berjudul "' . $this->judul_promosi . '" telah dihapus oleh Administrator.',
            'url' => route('user.promosi.index'),
            'icon' => 'fas fa-trash'
        ];
    }
}
