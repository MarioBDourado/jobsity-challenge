<?php

namespace App\BotMan\Conversations;

use Auth;
use Mail;
use App\Models\User;
use App\Mail\Login as MailLogin;
use BotMan\BotMan\Messages\Conversations\InlineConversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use Grosv\LaravelPasswordlessLogin\PasswordlessLogin;

class LoginConversation extends InlineConversation
{
    public function run()
    {
        $this->askForEmail();
    }

    public function askForEmail()
    {
        $this->bot->ask('What is your email?', function(Answer $answer) {
            $email = $answer->getText();

            $user = User::where('email', $email)->first();

            if (!$user) {
                $this->bot->reply('You need to signup');

                return;
            }

            $url = PasswordlessLogin::forUser($user)->generate();
            Mail::to($email)->send(new MailLogin($url));
            $this->bot->reply('I sent you a magic link for login');
        });
    }
}
