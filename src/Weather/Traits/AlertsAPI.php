<?php

namespace DashCode\Traits;

use DashCode\Services\GuzzleClient;

class AlertsAPI extends GuzzleClient
{
    public function AlertsByLocationKey()
    {
        $url = getUrl('alerts.specific.location');
        return $this->get($url);
    }
}
