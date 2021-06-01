<?php

namespace App\BotMan\Messages;

use App\FixerIO\Client as FixerIOClient;

class ConvertMessage extends AbstractMessage
{
    public function handle()
    {

    }

    protected function convert($from, $to, $value)
    {
        $value = (new FixerIOClient())->convert($from, $to, $value);

        dd($value);
    }
}
