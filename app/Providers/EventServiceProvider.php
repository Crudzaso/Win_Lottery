<?php

namespace App\Providers;

use App\Events\WebhookMessageEvent;
use App\Listeners\SendDiscordWebhook;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use App\Listeners\SendDiscordMessageOnUserLoggedIn;
use App\Listeners\SendDiscordMessageOnUserRegistered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // Eventos predeterminados de Laravel
        Registered::class => [
            SendDiscordMessageOnUserRegistered::class,
        ],
        Login::class => [
            SendDiscordMessageOnUserLoggedIn::class,
        ],

        // Tu evento personalizado para Webhook
        WebhookMessageEvent::class => [
            SendDiscordWebhook::class,
        ],

        // Evento de compra de boleto (si ya has creado uno)
        \App\Events\TicketBoughtEvent::class => [
            \App\Listeners\SendDiscordMessageOnTicketBought::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        // Aquí puedes agregar otras configuraciones para eventos
    }
}
