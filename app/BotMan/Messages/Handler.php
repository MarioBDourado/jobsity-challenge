<?php

namespace App\BotMan\Messages;

class Handler
{
    const MESSAGES = [
        'Balance' => BalanceMessage::class,
        'Convert' => ConvertMessage::class,
        'Currencies' => CurrenciesMessage::class,
        'Deposit' => DepositMessage::class,
        'Login' => LoginMessage::class,
        'Logout' => LogoutMessage::class,
        'Options' => OptionsMessage::class,
        'Set default currency' => SetDefaultCurrencyMessage::class,
        'What is the answer' => FortyTwoMessage::class,
        'Who am i' => WhoAmIMessage::class,
        'Withdraw' => WithdrawMessage::class,
    ];

    // USD 1.00 = EUR 0.82
    // https://mailtrap.io/inboxes/1337076/messages
    // https://www.codecheef.org/article/how-to-install-botman-chatbot-in-laravel
    // https://medium.com/skyshidigital/create-simple-chatbots-with-laravel-and-botman-under-5-minutes-ee37e617d03e
    // https://github.com/grosv/laravel-passwordless-login
}
