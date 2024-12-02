<?php

namespace App\Listeners;

use App\Events\WebhookMessageEvent;
use App\Services\DiscordWebhookService;

class SendDiscordWebhook
{
    public $discordWebhookService;

    public function __construct(DiscordWebhookService $discordWebhookService)
    {
        $this->discordWebhookService = $discordWebhookService;
    }

    public function handle(WebhookMessageEvent $event)
    {
        return $this->discordWebhookService->sendMessage($event->message);
    }
}
