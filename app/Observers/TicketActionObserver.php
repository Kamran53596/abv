<?php

namespace App\Observers;

use App\Notifications\AssignedTicketNotification;
use App\Models\Apps\Support\Ticket;
use Illuminate\Support\Facades\Notification;
use App\Traits\PushNotification;

class TicketActionObserver
{
    use PushNotification;

    public function updated(Ticket $model)
    {
        if($model->wasChanged('user_id'))
        {
            $user = $model->user;
            if($user)
            {
                Notification::send($user, new AssignedTicketNotification($model));

                $message = [
                    'to' => $user->app_id,
                    'notification' => [
                        'title' => 'Yeni Tiket',
                        'body' => 'Sizi yeni tiketə təyin etdilər',
                        'icon' => '',
                        'click_action' => route('ticket.show', $model->id)
                    ],
                ];

                $this->sendNotification($message);
            }
        }
    }
}