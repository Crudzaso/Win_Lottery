<?php

namespace App\Helpers;

use App\Services\DiscordWebhookService;

class DiscordWebhookHelper
{
    public static function sendMessage($message)
    {
        $webhookService = new DiscordWebhookService();
        return $webhookService->sendMessage($message);
    }

    public static function sendEmbed($title, $description, $color)
    {
        $webhookService = new DiscordWebhookService();
        return $webhookService->sendEmbed($title, $description, $color);
    }
}
