<?php

namespace DashCode\APIs;

use DashCode\Services\GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class CurrentConditions extends GuzzleClient
{
    public function __construct($apiKey, $lang)
    {
        parent::__construct($apiKey, $lang);
    }

    public function location($locationKey, bool $details = false)
    {
        $this->option['query']['details'] = $details;

        $url = resolveUrl('current_condition.location_wise.location', $locationKey);
        return $this->get($url);
    }

    /**
     * Group size, indicating how many cities to return. Valid values are 50, 100, or 150. Click to edit the value.
     * @param int $group
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function topCities(int $group = 50)
    {
        if (!in_array($group, [50, 100, 150]))
            $this->throwException("group value must be 50,100 or 150");

        $url = resolveUrl('current_condition.top_cities.group', $group);
        return $this->get($url);
    }

    /**
     * @param $locationKey
     * @param bool $details
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function past6HourCondition($locationKey, bool $details = false)
    {
        $this->option['query']['details'] = $details;

        $url = resolveUrl('current_condition.historical.past_6_hour', $locationKey);
        return $this->get($url);
    }

    /**
     * @param $locationKey
     * @param bool $details
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function past24HourCondition($locationKey, bool $details = false)
    {
        $this->option['query']['details'] = $details;

        $url = resolveUrl('current_condition.historical.past_24_hour', $locationKey);
        return $this->get($url);
    }
}
