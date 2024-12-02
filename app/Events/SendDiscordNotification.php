<?php

namespace App\Events;

class SendDiscordNotification
{
    public $message;
    public $embed;

    public function __construct($message = null, $embed = null)
    {
        $this->message = $message;
        $this->embed = $embed;
    }
}

