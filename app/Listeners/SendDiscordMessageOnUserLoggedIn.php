<?php

namespace App\Listeners;

use App\Events\WebhookMessageEvent;
use Illuminate\Auth\Events\Login;


class SendDiscordMessageOnUserLoggedIn
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        // Mensaje a enviar al canal de Discord
        $message = "Usuario ha iniciado sesión: " . $event->user->name . " (Email: " . $event->user->email . ")";
        
        // Disparar el evento para enviar el mensaje a Discord
        event(new WebhookMessageEvent($message));
    }
}
