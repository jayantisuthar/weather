<?php

namespace DashCode\APIs;

use DashCode\Services\GuzzleClient;

class Alerts extends GuzzleClient
{
    public function __construct($apiKey, $lang, $option)
    {
        parent::__construct($apiKey, $lang, $option);
    }

    public function location($locationKey, bool $details = false)
    {
        $this->option['query']['details'] = $details;

        $url = resolveUrl('alerts.specific.location', $locationKey);
        return $this->get($url);
    }
}
