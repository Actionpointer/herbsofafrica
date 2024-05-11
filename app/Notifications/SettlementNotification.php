<?php

namespace App\Notifications;

use App\Models\Settlement;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SettlementNotification extends Notification
{
    use Queueable;
    public $settlement;

    /**
     * Create a new notification instance.
     */
    public function __construct(Settlement $settlement)
    {
        $this->settlement = $settlement;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('A commission of '.$this->settlement->amount.' '.$this->settlement->currency.' has been paid to you as earnings from Order: '.$this->settlement->order_id)
                    ->line('Thank you for using Herbs of Africa!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
