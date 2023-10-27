<?php

namespace DashCode\Traits;

use DashCode\Services\GuzzleClient;

class AlertsAPI extends GuzzleClient
{
    public function AlertsByLocationKey($locationKey)
    {
        $url = resolveUrl('alerts.specific.location', $locationKey);
        return $this->get($url);
    }
}
