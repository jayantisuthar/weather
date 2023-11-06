<?php

namespace DashCode\APIs;

use DashCode\Services\GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class WeatherAlarms extends GuzzleClient
{
    public function __construct($apiKey, $lang, $option)
    {
        parent::__construct($apiKey, $lang, $option);
    }

    /**
     * @param string $locationKey
     * @param int $day
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function dayWise(string $locationKey, int $day = 1)
    {
        if (!in_array($day, [1, 5, 10, 15]))
            $this->throwException("day must be selected from [1, 5, 10, 15]");

        $url = resolveUrl('weather_alarm.dayWise', $day, $locationKey);
        return $this->get($url);
    }
}
