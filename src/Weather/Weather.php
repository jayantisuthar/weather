<?php

namespace DashCode;

use DashCode\Traits\AlertsAPI;
use DashCode\Traits\CurrentConditionsAPI;
use DashCode\Traits\ForecastAPI;
use DashCode\Traits\ImageryAPI;
use DashCode\Traits\IndicesAPI;
use DashCode\Traits\LocationsAPI;
use DashCode\Traits\MinuteCastAPI;
use DashCode\Traits\TranslationsAPI;
use DashCode\Traits\TropicalAPI;
use DashCode\Traits\WeatherAlarmsAPI;
use GuzzleHttp\Client;

class Weather
{
    use AlertsAPI;
    use CurrentConditionsAPI;
    use ForecastAPI;
    use ImageryAPI;
    use IndicesAPI;
    use LocationsAPI;
    use MinuteCastAPI;
    use TranslationsAPI;
    use TropicalAPI;
    use WeatherAlarmsAPI;

    public string $base_url = 'https://dataservice.accuweather.com';

    /**
     * https://developer.accuweather.com/localizations-by-language
     * @var string
     */
    public string $language = 'en-us';


    public int $offset = 100;

    public function __construct(public $apiKey)
    {

    }

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
