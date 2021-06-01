<?php

namespace App\BotMan\Messages;

class WithdrawMessage extends AbstractMessage
{
    public function handle()
    {
        $this->botman->reply('WithdrawMessage');
    }
}
