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

    public static function alerts(): Alerts
    {
        return new Alerts(self::$apiKey);
    }

    public static function currentConditions(): CurrentConditions
    {
        return new CurrentConditions(self::$apiKey);
    }

    public static function forecast(): Forecast
    {
        return new Forecast(self::$apiKey);
    }

    public static function imagery(): Imagery
    {
        return new Imagery(self::$apiKey);
    }

    public static function Indices(): Indices
    {
        return new Indices(self::$apiKey);
    }

    public static function Locations(): Locations
    {
        return new Locations(self::$apiKey);
    }

    public static function MinuteCast(): MinuteCast
    {
        return new MinuteCast(self::$apiKey);
    }

    public static function Translations(): Translations
    {
        return new Translations(self::$apiKey);
    }

    public static function Tropical(): Tropical
    {
        return new Tropical(self::$apiKey);
    }

    public static function WeatherAlarms(): WeatherAlarms
    {
        return new WeatherAlarms(self::$apiKey);
    }
}
