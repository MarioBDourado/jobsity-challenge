<?php

namespace App\BotMan\Conversations;

use Auth;
use App\FixerIO\Currency;
use BotMan\BotMan\Messages\Conversations\InlineConversation;
use BotMan\BotMan\Messages\Incoming\Answer;

class DepositConversation extends InlineConversation
{
    public function run()
    {
        $this->bot->ask('How much? Specify currency if you want', function(Answer $answer) {
            $deposit = $answer->getText();

            if (!Currency::isValid($currency)) {
                $this->bot->reply('Invalid currency');
            }

            (Auth::user())->setAccountDefaultCurrency($currency);
            $this->bot->reply(sprintf('Default currency set to %s', $currency));
        });
    }
}
