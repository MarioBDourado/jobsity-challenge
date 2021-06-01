<?php

namespace App\BotMan\Messages;

use App\Conversations\DepositConversation;

class DepositMessage extends AbstractMessage
{
    public function handle()
    {
        if (!$this->isValidAccount()) {
            $this->botman->reply('Invalid account. Use \'Set default currency\'');

            return;
        }

        $this->botman->startConversation(new DepositConversation);
    }

    protected function isValidAccount()
    {
        if (!$this->user ||
            !$this->user->account ||
            !$this->user->account->default_currency) {
            return false;
        }

        return true;
    }
}
