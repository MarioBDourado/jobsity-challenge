<?php

namespace App\BotMan\Messages;

class FortyTwoMessage extends AbstractMessage
{
    CONST EASTER_EGG = true;

    public function handle()
    {
        $this->botman->reply('The answer for life, the universe and everything is 42');
    }
}
