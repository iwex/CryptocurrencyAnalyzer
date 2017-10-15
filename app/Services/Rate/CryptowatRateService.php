<?php

namespace App\Services\Rate;

class CryptowatRateService extends AbstractRateService implements RateServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function getRate(): Rate
    {
        $responseContent = $this->getResponseContent();

        return new Rate(
            'BTC',
            'USD',
            $responseContent->result->price->last,
            $responseContent->result->price->change->absolute,
            $responseContent->result->volume
        );
    }

    /**
     * {@inheritdoc}
     */
    protected function getUrl(): string
    {
        return 'https://api.cryptowat.ch/markets/gdax/btcusd/summary';
    }
}
