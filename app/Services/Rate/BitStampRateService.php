<?php

namespace App\Services\Rate;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class BitStampRateService implements RateServiceInterface
{
    const URL = 'https://www.bitstamp.net/api/v2/ticker/btcusd';
    const LAST_HOUR_URL = 'https://www.bitstamp.net/api/v2/ticker_hour/btcusd';

    public function getRate(): Rate
    {
        $client = new Client();

        /** @var Response $response */
        $response        = $client->request('GET', self::URL);
        $lastHour        = $client->request('GET', self::LAST_HOUR_URL);
        $responseContent = \GuzzleHttp\json_decode($response->getBody()->getContents());
        $lastHourResponse = \GuzzleHttp\json_decode($lastHour->getBody()->getContents());
        $rate = new Rate(
            'BTC',
            'USD',
            $responseContent->last,
            $lastHourResponse->last,
            $responseContent->volume
        );
        return $rate;
    }
}
