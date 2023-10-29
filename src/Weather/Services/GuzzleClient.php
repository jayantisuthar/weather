<?php

namespace DashCode\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class GuzzleClient
{

    public string $base_url = 'https://dataservice.accuweather.com';

    /**
     * https://developer.accuweather.com/localizations-by-language
     * @var string
     */
    public string $language = 'en-us';
    public array $option = [];

    public function __construct($apiKey)
    {
        $this->option['query']['apiKey'] = $apiKey;
    }

    /**
     * @throws GuzzleException
     */
    public function get($url, $options)
    {
        $this->option = array_merge($this->option, $options);

        $config = [
            'base_uri' => $this->base_url,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ],
            'http_errors' => false,
            //            'debug' => true,
            'exceptions' => false,
            'verify' => false
        ];

        $client = new Client($config);
        return $client->get($url, $this->option);
    }
}
