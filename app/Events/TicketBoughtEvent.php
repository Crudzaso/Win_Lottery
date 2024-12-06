<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class TicketBoughtEvent
{
    use SerializesModels;

    public $user;
    public $ticket;

    /**
     * Create a new event instance.
     *
     * @param  $user
     * @param  $ticket
     * @return void
     */
    public function __construct($user, $ticket)
    {
        $this->user = $user;
        $this->ticket = $ticket;
    }
}
