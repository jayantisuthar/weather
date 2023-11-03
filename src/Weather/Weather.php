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

    public function __construct($apiKey, $lan, $options)
    {
        $this->apiKey = $apiKey;
        $this->language = $lan;
        $this->options = $options;
    }

    public static function config($apiKey = '', $lan = 'en-us', $options = []): self
    {
        $class = __CLASS__;
        return new $class($apiKey, $lan, $options);
    }

    public function alerts(): Alerts
    {
        return new Alerts($this->apiKey, $this->language, $this->options);
    }

    public function currentConditions(): CurrentConditions
    {
        return new CurrentConditions($this->apiKey, $this->language, $this->options);
    }

    public function forecast(): Forecast
    {
        return new Forecast($this->apiKey, $this->language, $this->options);
    }

    public function imagery(): Imagery
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
