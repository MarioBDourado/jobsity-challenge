<?php

namespace App\FixerIO;

use GuzzleHttp\Client as GuzzleClient;

class Client
{
    const GET_SYMBOLS_ENDPOINT = 'symbols';

    public function getSymbols()
    {
        $uri = $this->getSymbolsUri();
        $data = $this->getData($uri);

        if (!$data->success) {
            return false;
        }

        return $data->symbols;
    }

    protected function getSymbolsUri()
    {
        return sprintf(
            '%s/%s?access_key=%s',
            Config('fixerio.api.uri'),
            self::GET_SYMBOLS_ENDPOINT,
            Config('fixerio.api.key')
        );
    }

    public function convert($from, $to, $value)
    {
        $uri = $this->getConvertUri($from, $to, $value);
        $data = $this->getData($uri);

        dd($uri, $data);
    }

    protected function getConvertUri($from, $to, $value)
    {
        $params = [
            'access_key' => Config('fixerio.api.key'),
            'from' => $from,
            'to' => $to,
            'value' => $value,
        ];

        $queryString = [];

        foreach ($params as $key => $value) {
            $queryString[] = sprintf(
                '%s=%s',
                urlencode($key),
                urlencode($value)
            );
        }

        return sprintf(
            '%s/%s?%s',
            Config('fixerio.api.uri'),
            self::GET_SYMBOLS_ENDPOINT,
            implode('&', $queryString)
        );
    }

    public function getData($uri)
    {
        $client = new GuzzleClient();
        $response = $client->get($uri);
        $results = json_decode($response->getBody()->getContents());
        return $results;
    }
}
