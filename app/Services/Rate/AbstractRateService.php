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

        return $client->request($this->getMethod(), $this->getUrl(), $this->getOptions());
    }

    /**
     * @return string
     */
    protected function getMethod(): string
    {
        return 'GET';
    }

    /**
     * @return string
     */
    abstract protected function getUrl(): string;

    /**
     * @return array
     */
    protected function getOptions(): array
    {
        return [];
    }
}
