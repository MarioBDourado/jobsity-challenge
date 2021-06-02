<?php

namespace App\BotMan\Messages;

use App\BotMan\Conversations\LoginConversation;

class LoginMessage extends AbstractMessage
{
    public function handle()
    {
        if ($this->user) {
            $this->botman->reply('You are logged in');

            return;
        }

        $this->botman->startConversation(new LoginConversation);
    }
}
