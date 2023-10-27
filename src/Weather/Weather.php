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
    use CurrentConditionsAPI;
    use ForecastAPI;
    use ImageryAPI;
    use IndicesAPI;
    use LocationsAPI;
    use MinuteCastAPI;
    use TranslationsAPI;
    use TropicalAPI;
    use WeatherAlarmsAPI;


    public function __construct(public $apiKey)
    {

    }

    public static function Alerts(): AlertsAPI
    {
        return new AlertsAPI();
    }


}
