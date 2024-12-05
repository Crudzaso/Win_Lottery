<?php

namespace App\Listeners;

use App\Events\LotteryPurchased;
use App\Events\LotteryPurchaseError;
use App\Service\DiscordWebhookService;

class SendLotteryNotification
{
    protected $discordWebhook;

    private const COLOR_PURCHASED = 0x36ff00;  // Color para compra exitosa
    private const COLOR_ERROR = 0xff2d00;     // Color para error en la compra

    public function __construct(DiscordWebhookService $discordWebhookService)
    {
        $this->discordWebhook = $discordWebhookService;
    }

    /**
     * Handle the event when a lottery is purchased.
     */
    public function handleLotteryPurchased(LotteryPurchased $event): void
    {
        $this->sendLotteryNotification($event->user, $event->lottery, 'comprada', self::COLOR_PURCHASED);
    }

    /**
     * Handle the event when there is an error in the lottery purchase.
     */
    public function handleLotteryPurchaseError(LotteryPurchaseError $event): void
    {
        $this->sendLotteryNotification($event->user, $event->lottery, 'error en la compra', self::COLOR_ERROR, $event->errorMessage);
    }

    /**
     * Send the notification to Discord.
     */
    protected function sendLotteryNotification($user, $lottery, $action, $color, $errorMessage = null)
    {
        try {
            $embed = [
                'title' => "🎉 Lotería {$action} 🎉",
                'color' => $color,
                'thumbnail' => [
                    'url' => "https://i.postimg.cc/SKLLW24B/logo-suerte-paisa.webp",
                ],
                'fields' => [
                    [
                        'name' => '💼 Id de Usuario',
                        'value' => "{$user->id}",
                        'inline' => true,
                    ],
                    [
                        'name' => '👤 Nombre del Usuario',
                        'value' => "{$user->names} {$user->lastnames}",
                        'inline' => true,
                    ],
                    [
                        'name' => '📧 Correo del Usuario',
                        'value' => $user->email,
                        'inline' => false,
                    ],
                    [
                        'name' => '🎰 Lotería Comprada',
                        'value' => $lottery->name ?? 'Desconocida',
                        'inline' => false,
                    ],
                    [
                        'name' => '🛠️ Realizado por',
                        'value' => "Administrador",
                        'inline' => false,
                    ],
                ],
                'footer' => [
                    'text' => implode(" | ", [
                        '📍 Notificación generada en Suerte Paisa',
                        '🕒 Notificación realizada el ' . now()->format('d/m/y H:i')
                    ]),
                ],
                'timestamp' => now()->toIso8601String(),
                'author' => [
                    'name' => "👤 {$user->names} {$user->lastnames}",
                ],
            ];

            if ($errorMessage) {
                $embed['fields'][] = [
                    'name' => '⚠️ Error',
                    'value' => $errorMessage,
                    'inline' => false,
                ];
            }

            $this->discordWebhook->sendEmbed($embed);

        } catch (\Exception $e) {
            \Log::error("Error al enviar notificación de Discord: " . $e->getMessage());
        }
    }
}
