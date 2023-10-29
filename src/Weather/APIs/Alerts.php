<?php

namespace DashCode\APIs;

use DashCode\Services\GuzzleClient;

class Alerts extends GuzzleClient
{
    public function __construct($apiKey)
    {
        parent::__construct($apiKey);
    }

    public function AlertsByLocationKey($locationKey, $details = false, $options = [])
    {
        $url = resolveUrl('alerts.specific.location', $locationKey);
        return $this->get($url, $options);
    }
}
