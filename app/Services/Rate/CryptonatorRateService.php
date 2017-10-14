<?php

namespace App\Services\Rate;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class CryptonatorRateService implements RateServiceInterface
{
    const URL = 'https://api.cryptonator.com/api/full/btc-usd';

    public function getRate(): Rate
    {
        $client = new Client();

        /** @var Response $response */
        $response        = $client->request('GET', self::URL);
        $responseContent = \GuzzleHttp\json_decode($response->getBody()->getContents());

        $rate = new Rate(
            $responseContent->ticker->base,
            $responseContent->ticker->target,
            $responseContent->ticker->price,
            $responseContent->ticker->change,
            $responseContent->ticker->volume
        );

        return $rate;
    }
}
