<?php

namespace DashCode\APIs;

use DashCode\Services\GuzzleClient;

class Alerts extends GuzzleClient
{
    public function __construct($apiKey)
    {
        parent::__construct($apiKey);
    }

    public function location($locationKey, bool $details = false, array $options = [])
    {
        $url = resolveUrl('alerts.specific.location', $locationKey);
        return $this->get($url, $options);
    }
}
