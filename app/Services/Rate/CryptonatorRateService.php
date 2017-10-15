<?php

namespace App\Services\Rate;

class CryptonatorRateService extends AbstractRateService implements RateServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function getRate(): Rate
    {
        $responseContent = $this->getResponseContent();

        return new Rate(
            $responseContent->ticker->base,
            $responseContent->ticker->target,
            $responseContent->ticker->price,
            $responseContent->ticker->change,
            $responseContent->ticker->volume
        );
    }

    /**
     * {@inheritdoc}
     */
    protected function getUrl(): string
    {
        return 'https://api.cryptonator.com/api/full/btc-usd';
    }
}
