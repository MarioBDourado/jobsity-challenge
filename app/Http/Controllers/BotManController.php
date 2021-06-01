<?php

namespace App\Http\Controllers;

use App\FixerIO\Currency;
use BotMan\BotMan\BotMan;
use App\BotMan\Messages\Handler as MessageHandler;

class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        foreach(MessageHandler::MESSAGES as $message => $handler) {
            $botman->hears(strtolower($message), function($botman, $message = '') use ($handler) {
                (new $handler($botman, $message))->handle();
            });
        }

        $botman->fallback(function($bot) {
            $bot->reply('Command not valid');
        });

        $botman->listen();
    }

    public function mail()
    {

    }
}
