<?php

namespace App\Listeners;

use App\Events\WebhookMessageEvent;
use Illuminate\Auth\Events\Registered;


class SendDiscordMessageOnUserRegistered
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        // Mensaje a enviar al canal de Discord
        $message = "Nuevo registro: " . $event->user->name . " (Email: " . $event->user->email . ")";
        
        // Disparar el evento para enviar el mensaje a Discord
        event(new WebhookMessageEvent($message));
    }
}
