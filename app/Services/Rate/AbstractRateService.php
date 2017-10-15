<?php

namespace App\Services\Rate;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

abstract class AbstractRateService
{
    /**
     * @return mixed
     */
    public function getResponseContent()
    {
        return \GuzzleHttp\json_decode($this->getResponse()->getBody()->getContents());
    }

    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        $client = new Client();

        return $client->request('GET', $this->getUrl());
    }

    /**
     * @return string
     */
    abstract protected function getUrl(): string;
}
