<?php

namespace App\BotMan\Messages;

use Auth;
use App\FixerIO\Client as FixerIOClient;
use App\Models\Account;
use BotMan\BotMan\BotMan;

class BalanceMessage extends AbstractMessage
{
    public function handle()
    {
        if (!$this->user ||
            !$this->user->account) {
            $this->botman->reply('You need to be logged in and have an account');

            return;
        }

        $this->botman->reply(
            sprintf(
                'Your balance is %s %01.2f',
                $this->user->account->default_currency,
                $this->user->account->balance
            )
        );
    }
}
