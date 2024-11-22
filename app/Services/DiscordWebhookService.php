<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DiscordWebhookService
{
    // Enviar un mensaje básico
    public function sendMessage($message)
    {
        $webhookUrl = env('DISCORD_WEBHOOK_URL');

        $response = Http::post($webhookUrl, [
            'content' => $message
        ]);

        return $response->status() === 204;
    }

    // Enviar un mensaje con Embed
    public function sendEmbed($title, $description, $color)
    {
        $webhookUrl = env('DISCORD_WEBHOOK_URL');

        $embed = [
            'title' => $title,
            'description' => $description,
            'color' => hexdec($color),
        ];

        $response = Http::post($webhookUrl, [
            'embeds' => [$embed]
        ]);

        return $response->status() === 204;
    }
}
