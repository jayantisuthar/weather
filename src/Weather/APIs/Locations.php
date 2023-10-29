<?php

namespace DashCode\APIs;

use DashCode\Services\GuzzleClient;

class Locations  extends GuzzleClient
{
    public function getAdminAreaList($countryCode)
    {
        $url = $this->base_url.'/'.$countryCode;
        return $this->get($url);
    }

}
