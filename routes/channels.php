<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\Apps\Support\Ticket;

Broadcast::channel('ticket.{ticketId}', function ($user, $ticketId) {
    $ticket = Ticket::find($ticketId);

    return $user->can('editTicket') || ($user->id == $ticket->user_id);
});
