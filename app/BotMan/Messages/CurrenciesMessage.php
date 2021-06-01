<?php

namespace App\BotMan\Messages;

class CurrenciesMessage extends AbstractMessage
{
    public function handle()
    {
        $this->botman->types();

        $symbols = $this->getSymbols();

        $message = [];
        foreach ($symbols as $code => $country) {
            $message[] = sprintf(
                '%s - %s',
                $country,
                $code
            );
        }

        sort($message);

        $this->botman->reply(implode("<br>", $message));
    }
}
