<?php

namespace App\BotMan\Messages;

use Auth;
use App\FixerIO\Client as FixerIOClient;
use BotMan\BotMan\BotMan;

abstract class AbstractMessage
{
    protected $botman;
    protected $message;
    protected $user;

    CONST EASTER_EGG = false;

    public function __construct(BotMan $botman, $message)
    {
        $this->botman = $botman;
        $this->message = $message;
        $this->user = Auth::user();
    }

    abstract public function handle();
}
