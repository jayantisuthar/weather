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

final class Weather
{

    public string $apiKey = '';
    public string $language = '';
    public array $options = [];

    public function __construct($apiKey = null, $lan = null, $options = [])
    {
        $this->apiKey = $apiKey ?? getenv('ACCU_WEATHER_KEY');
        $this->language = $lan ?? getenv('ACCU_WEATHER_LOCALE');
        $this->options = $options;
    }

    public function Alerts(): Alerts
    {
        return new Alerts($this->apiKey, $this->language, $this->options);
    }

    public function CurrentConditions(): CurrentConditions
    {
        return new CurrentConditions($this->apiKey, $this->language, $this->options);
    }

    public function Forecast(): Forecast
    {
        return new Forecast($this->apiKey, $this->language, $this->options);
    }

    public function Imagery(): Imagery
    {
        return new Imagery($this->apiKey, $this->language, $this->options);
    }

    public function Indices(): Indices
    {
        return new Indices($this->apiKey, $this->language, $this->options);
    }

    public function Locations(): Locations
    {
        return new Locations($this->apiKey, $this->language, $this->options);
    }

    public function MinuteCast(): MinuteCast
    {
        return new MinuteCast($this->apiKey, $this->language, $this->options);
    }

    public function Translations(): Translations
    {
        return new Translations($this->apiKey, $this->language, $this->options);
    }

    public function Tropical(): Tropical
    {
        return new Tropical($this->apiKey, $this->language, $this->options);
    }

    public function WeatherAlarms(): WeatherAlarms
    {
        return new WeatherAlarms($this->apiKey, $this->language, $this->options);
    }
}
