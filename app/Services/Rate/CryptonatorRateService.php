<?php

namespace App\Services\Rate;

class CryptonatorRateService extends AbstractRateService implements RateServiceInterface
{
    const URL = 'https://api.cryptonator.com/api/full/btc-us';

    /**
     * {@inheritdoc}
     */
    public function getRate(): Rate
    {
        $responseContent = $this->getResponseContent('GET', self::URL);

        return new Rate(
            $responseContent->ticker->base,
            $responseContent->ticker->target,
            $responseContent->ticker->price,
            $responseContent->ticker->change,
            $responseContent->ticker->volume
        );
    }
}
