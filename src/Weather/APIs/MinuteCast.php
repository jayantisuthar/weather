<?php

namespace DashCode\APIs;

use DashCode\Services\GuzzleClient;

class MinuteCast  extends GuzzleClient
{
    public function __construct($apiKey, $lang)
    {
        parent::__construct($apiKey, $lang);
    }


    public function summary( float $lat , float $long)
    {
        $url = resolveUrl('alerts.specific.location');
        return $this->get($url, ['query' => ['q' => "$lat,$long"]]);
    }

}
