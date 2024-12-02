<?php

namespace App\Providers;

use App\Events\UserCreated;
use App\Events\UserUpdated;
use App\Events\UserDeleted;
use App\Events\UserRestore;
use App\Events\UserLogin;
use App\Listeners\SendDiscordNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UserCreated::class => [
            SendDiscordNotification::class,
        ],
        UserUpdated::class => [
            SendDiscordNotification::class,
        ],
        UserDeleted::class => [
            SendDiscordNotification::class,
        ],
        UserRestore::class => [
            SendDiscordNotification::class,
        ],
        UserLogin::class => [
            SendDiscordNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents(): bool
    {
        return false; // Cambia a true si prefieres la detección automática.
    }
}
