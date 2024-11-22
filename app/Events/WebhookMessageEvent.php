<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class WebhookMessageEvent
{
    use SerializesModels;

    public $message;

    // Pasar el mensaje al evento
    public function __construct($message)
    {
        $this->message = $message;
    }
}
