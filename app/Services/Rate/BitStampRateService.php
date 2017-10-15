<?php

namespace App\Services\Rate;

class BitStampRateService extends AbstractRateService implements RateServiceInterface
{
    const URL = 'https://www.bitstamp.net/api/v2/ticker/btcusd';
    const LAST_HOUR_URL = 'https://www.bitstamp.net/api/v2/ticker_hour/btcusd';

    /**
     * {@inheritdoc}
     */
    public function getRate(): Rate
    {
        $responseContent         = $this->getResponseContent('GET', self::URL);
        $lastHourResponseContent = $this->getResponseContent('GET', self::LAST_HOUR_URL);

        $rate = new Rate(
            'BTC',
            'USD',
            $responseContent->last,
            $lastHourResponseContent->last,
            $responseContent->volume
        );

        return $rate;
    }
}
