<?php

namespace App\BotMan\Messages;

use App\BotMan\Conversations\SetDefaultCurrencyConversation;

class SetDefaultCurrencyMessage extends AbstractMessage
{
    public function handle()
    {
        if (!$this->user) {
            $this->botman->reply('You must be loggen in');

            return;
        }

        if ($this->user->account && $this->user->account->default_currency) {
            $this->botman->reply(sprintf(
                'You\'ve already set your default currency to %s',
                $this->user->account->default_currency
            ));

            return;
        }

        $this->botman->startConversation(new SetDefaultCurrencyConversation);
    }
}
