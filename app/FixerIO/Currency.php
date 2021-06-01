<?php

namespace App\FixerIO;

use Illuminate\Support\Facades\Cache;

class Currency
{
    public static function isValid($value)
    {
        $symbols = self::getSymbols();

        if (empty($symbols)) {
            return false;
        }

        return in_array($value, array_keys((array) $symbols));
    }

    public static function getSymbols()
    {
        if (!$symbols = Cache::get('symbols')) {
            $symbols = (new Client)->getSymbols();
            Cache::store('file')->put('symbols', $symbols, 3600);
        }

        if (!$symbols) {
            $this->botman->reply('Error getting data. Try again');

            return;
        }

        return $symbols;
    }
}
