<?php

namespace DashCode;

use DashCode\APIs\Alerts;
use DashCode\APIs\CurrentConditions;
use DashCode\APIs\Forecast;
use DashCode\APIs\Imagery;
use DashCode\APIs\Indices;
use DashCode\APIs\Locations;
use DashCode\APIs\MinuteCast;
use DashCode\APIs\Translations;
use DashCode\APIs\Tropical;
use DashCode\APIs\WeatherAlarms;

final class Weather implements WeatherInterface
{

    public string $apiKey = '';
    public string $language = '';

    public function __construct($apiKey = '', $lan = 'en-us')
    {
        $this->apiKey = $apiKey;
        $this->language = $lan;
    }

    public function alertsApi(): Alerts
    {
        return new Alerts(self::getKey());
    }
//
//    public static function currentConditions(): CurrentConditions
//    {
//        return new CurrentConditions($this->apiKey);
//    }
//
//    public static function forecast(): Forecast
//    {
//        return new Forecast($this->apiKey);
//    }
//
//    public static function imagery(): Imagery
//    {
//        return new Imagery($this->apiKey);
//    }
//
//    public static function Indices(): Indices
//    {
//        return new Indices($this->apiKey);
//    }
//
//    public static function Locations(): Locations
//    {
//        return new Locations($this->apiKey);
//    }
//
//    public static function MinuteCast(): MinuteCast
//    {
//        return new MinuteCast($this->apiKey);
//    }
//
//    public static function Translations(): Translations
//    {
//        return new Translations($this->apiKey);
//    }
//
//    public static function Tropical(): Tropical
//    {
//        return new Tropical($this->apiKey);
//    }
//
//    public static function WeatherAlarms(): WeatherAlarms
//    {
//        return new WeatherAlarms($this->apiKey);
//    }

    private function getKey() {
        return $this->apiKey;
    }

    private function getLanguage() {
        return $this->language;
    }
}
