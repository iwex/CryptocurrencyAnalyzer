<?php

return [
    'cryptonator'   => \App\Services\Rate\CryptonatorRateService::class,
    'bitstamp'      => \App\Services\Rate\BitStampRateService::class,
    'cryptowat'     => \App\Services\Rate\CryptowatRateService::class,
    'cryptocompare' => \App\Services\Rate\CryptoCompareRateService::class,
];
