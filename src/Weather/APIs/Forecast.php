<?php

namespace DashCode\APIs;

use DashCode\Services\GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Forecast extends GuzzleClient
{
    public function __construct($apiKey, $lang, $option)
    {
        parent::__construct($apiKey, $lang, $option);
    }

    /**
     * @param string $locationKey
     * @param int $day
     * @param bool $details
     * @param bool $metrics
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function daily(string $locationKey, int $day = 1, bool $details = false, bool $metrics = false)
    {
        $this->option['query']['details'] = $details;
        $this->option['query']['metric'] = $metrics;

        if (!in_array($day, [1, 5, 10, 15]))
            $this->throwException("day must be selected from [1, 5, 10, 15]");

        $url = resolveUrl('forecast.day_wise', $day, $locationKey);
        return $this->get($url);
    }

    /**
     * @param string $locationKey
     * @param int $hour
     * @param bool $details
     * @param bool $metrics
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function hourly(string $locationKey, int $hour = 1, bool $details = false, bool $metrics = false)
    {
        $this->option['query']['details'] = $details;
        $this->option['query']['metric'] = $metrics;

        if (!in_array($hour, [1, 12, 24, 72, 120]))
            $this->throwException("hour must be selected from [1, 12, 24, 72, 120]");

        $url = resolveUrl('forecast.hour_wise', $hour, $locationKey);
        return $this->get($url);
    }
}
