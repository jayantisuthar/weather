<?php

namespace DashCode\Services;

use GuzzleHttp\Client;

class GuzzleClient
{

    public string $base_url = 'https://dataservice.accuweather.com';

    /**
     * https://developer.accuweather.com/localizations-by-language
     * @var string
     */
    public string $language = 'en-us';

    public int $offset = 100;


    public function get($url)
    {
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
        $response = $client->get($url);
        return $response;
    }
}
