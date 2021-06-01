<?php

namespace App\BotMan\Messages;

class OptionsMessage extends AbstractMessage
{
    public function handle()
    {
        $options = [];
        foreach (Handler::MESSAGES as $message => $class) {
            if (!$class::EASTER_EGG) {
                $options[] = $message;
            }
        }

        $this->botman->reply(implode("<br>", $options));
    }
}
