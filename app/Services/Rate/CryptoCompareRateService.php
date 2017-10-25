<?php

namespace App\Services\Rate;

class CryptoCompareRateService extends AbstractRateService implements RateServiceInterface
{
    const URL = 'https://min-api.cryptocompare.com/data/price?fsym=BTC&tsyms=USD';

    /**
     * {@inheritdoc}
     */
    public function getRate(): Rate
    {
        $responseContent = $this->getResponseContent('GET', self::URL);

        return new Rate(
            'BTC',
            'USD',
            $responseContent->USD
        );
    }
}
