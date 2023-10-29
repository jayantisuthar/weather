<?php

namespace DashCode\APIs;

use DashCode\Services\GuzzleClient;

class Forecast extends GuzzleClient
{
    public function __construct($apiKey)
    {
        parent::__construct($apiKey);
    }

    public function Daily(string $locationKey, int $days = 1, bool $details = false, bool $metrics = false, array $options = [])
    {
        $url = resolveUrl('alerts.specific.location', $days, $locationKey);
        return $this->get($url, $options);
    }

    public function Hourly(string $locationKey, int $hours, bool $details = false, bool $metrics = false, array $options = [])
    {
        $url = resolveUrl('alerts.specific.location', $hours, $locationKey);
        return $this->get($url, $options);
    }
}
