<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class CommentEmailNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($comment, $ticket)
    {
        $this->comment = $comment;
        $this->ticket = $ticket;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Yeni cavab tiketdə '.$this->ticket->title)
                    ->greeting('Salam,')
                    ->line('Yeni cavab tiketdə '.$this->ticket->title.':')
                    ->line('')
                    ->line(Str::limit($this->comment->text, 500))
                    ->action('Tiletə baxın', route('tickets.show', $this->ticket->id))
                    ->line('Təşəkkür edirəm')
                    ->line(config('app.name') . ' Team')
                    ->salutation(' ');
    }
}