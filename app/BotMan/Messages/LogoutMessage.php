<?php

namespace App\BotMan\Messages;

use Auth;

class LogoutMessage extends AbstractMessage
{
    public function handle()
    {
        $message = 'You are not logged in';

        if ($this->user) {
            Auth::logout();
            $message = 'You\'ve been logged out';
        }

        $this->botman->reply($message);
    }
}
