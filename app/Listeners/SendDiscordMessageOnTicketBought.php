<?php

namespace App\Listeners;

use App\Events\TicketBoughtEvent;
use App\Events\WebhookMessageEvent;

class SendDiscordMessageOnTicketBought
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\TicketBoughtEvent  $event
     * @return void
     */
    public function handle(TicketBoughtEvent $event)
    {
        // Mensaje a enviar al canal de Discord
        $message = "Nuevo boleto comprado por " . $event->user->name . " (Email: " . $event->user->email . "). Boleto ID: " . $event->ticket->id;
        
        // Disparar el evento para enviar el mensaje a Discord
        event(new WebhookMessageEvent($message));
    }
}
