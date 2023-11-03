<?php

namespace DashCode\APIs;

use DashCode\Services\GuzzleClient;

class Forecast extends GuzzleClient
{
    public function __construct($apiKey, $lang, $option)
    {
        parent::__construct($apiKey, $lang, $option);
    }

    private function daily(string $locationKey, int $days = 1, bool $details = false, bool $metrics = false)
    {
        $this->option['query']['details'] = $details;
        $this->option['query']['metric'] = $metrics;

        $url = resolveUrl('forecast.daily.day', $days, $locationKey);
        return $this->get($url);
    }

    private function hourly(string $locationKey, int $hours = 1, bool $details = false, bool $metrics = false)
    {
        $this->option['query']['details'] = $details;
        $this->option['query']['metric'] = $metrics;

        $url = resolveUrl('forecast.hourly.hour', $hours, $locationKey);
        return $this->get($url);
    }
}
