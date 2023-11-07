<?php

namespace DashCode\Services;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class GuzzleClient
{

    public string $base_url = 'https://dataservice.accuweather.com';

    /**
     * https://developer.accuweather.com/localizations-by-language
     * @var string
     */
    public string $language = '';
    public array $option = [];

    public function __construct($apiKey, $language, $option)
    {
        $this->option['query']['apiKey'] = $apiKey;

        $this->option = array_merge($this->option, $option);

        $this->language = $language;
    }

    /**
     * @throws GuzzleException
     */
    public function get($url, $options = [])
    {
        $this->option = array_merge($this->option, $options);

        if ($this->option['query']['language'] === false)
            unset($this->option['query']['language']);


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

    public function throwException($message)
    {
        return throw new Exception($message);
    }
}
