<?php

namespace App\BotMan\Messages;

class WhoAmIMessage extends AbstractMessage
{
    public function handle()
    {
        $message = 'I don\'t know';

        if ($this->user) {
            $message = sprintf(
                'You are %s and your email is %s',
                $this->user->name,
                $this->user->email
            );
        }

        $this->botman->reply($message);
    }
}
