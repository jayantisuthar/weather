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

class Weather
{

    public static string $apiKey = '';

    public function __construct($apiKey = '')
    {
        self::$apiKey = $apiKey;
    }

    public static function Alerts(): Alerts
    {
        return new Alerts(self::$apiKey);
    }

    public static function CurrentConditions(): CurrentConditions
    {
        return new CurrentConditions();
    }

    public static function Forecast(): Forecast
    {
        return new Forecast();
    }

    public static function Imagery(): Imagery
    {
        return new Imagery();
    }

    public static function Indices(): Indices
    {
        return new Indices();
    }

    public static function Locations(): Locations
    {
        return new Locations();
    }

    public static function MinuteCast(): MinuteCast
    {
        return new MinuteCast();
    }

    public static function Translations(): Translations
    {
        return new Translations();
    }

    public static function Tropical(): Tropical
    {
        return new Tropical();
    }

    public static function WeatherAlarms(): WeatherAlarms
    {
        return new WeatherAlarms();
    }
}
