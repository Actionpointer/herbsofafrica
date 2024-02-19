<?php

namespace App\Notifications;

use App\Models\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class TrainingRegistrationNotification extends Notification
{
    use Queueable;
    public $registration;
    /**
     * Create a new notification instance.
     */
    public function __construct(Registration $registration)
    {
        $this->registration = $registration;
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
            ->subject('Training Registration')
            ->line('Someone registered for a training on Havron E-learning platform. The details are below:')
            ->line('Training Title: '.$this->registration->training->title)
            ->line('Name: '.$this->registration->name)
            ->line('Email: '.$this->registration->email)
            ->line('Address: '.$this->registration->address)
            ->line('Phone: '.$this->registration->phone)
            ->line('Comment: '.$this->registration->comment)
            ->line('Billing Currency: '.$this->registration->currency->name);
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
