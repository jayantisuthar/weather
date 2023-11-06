<?php

namespace DashCode\APIs;

use DashCode\Services\GuzzleClient;

class MinuteCast  extends GuzzleClient
{
    public function __construct($apiKey, $lang, $option)
    {
        parent::__construct($apiKey, $lang, $option);
    }


    public function summary( float $lat , float $long)
    {
        $url = resolveUrl('minute_cast_by.lat_long');
        return $this->get($url, ['query' => ['q' => "$lat,$long"]]);
    }

}
