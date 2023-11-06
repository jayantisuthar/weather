<?php

namespace DashCode\APIs;

use DashCode\Services\GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Alerts extends GuzzleClient
{
    public function __construct($apiKey, $lang, $option)
    {
        parent::__construct($apiKey, $lang, $option);
    }

    /**
     * @param $locationKey
     * @param bool $details
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function location($locationKey, bool $details = false): ResponseInterface
    {
        $this->option['query']['details'] = $details;

        $url = resolveUrl('alerts.specific.location', $locationKey);
        return $this->get($url);
    }
}
