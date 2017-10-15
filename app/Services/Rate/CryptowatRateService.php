<?php

namespace App\Services\Rate;

class CryptowatRateService extends AbstractRateService implements RateServiceInterface
{
    const URL = 'https://api.cryptowat.ch/markets/gdax/btcusd/summary';

    /**
     * {@inheritdoc}
     */
    public function getRate(): Rate
    {
        $responseContent = $this->getResponseContent('GET', self::URL);

        return new Rate(
            'BTC',
            'USD',
            $responseContent->result->price->last,
            $responseContent->result->price->change->absolute,
            $responseContent->result->volume
        );
    }
}
