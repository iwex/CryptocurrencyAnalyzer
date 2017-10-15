<?php

namespace App\Services\Rate;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

abstract class AbstractRateService
{
    /**
     * @var Client
     */
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @param string $method
     * @param string $url
     * @param array  $options
     * @return mixed
     */
    public function getResponseContent(string $method, string $url, array $options = [])
    {
        return $this->decodeResponseContents(
            $this->getResponse($method, $url, $options)
        );
    }

    /**
     * @param string $method
     * @param string $url
     * @param array  $options
     * @return Response
     */
    public function getResponse(string $method, string $url, array $options = []): Response
    {
        return $this->client->request($method, $url, $options);
    }

    /**
     * @param Response $response
     * @return mixed
     */
    protected function decodeResponseContents(Response $response)
    {
        return \GuzzleHttp\json_decode($response->getBody()->getContents());
    }
}
