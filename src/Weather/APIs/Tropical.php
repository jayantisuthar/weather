<?php

namespace DashCode\APIs;

use DashCode\Services\GuzzleClient;

class Tropical  extends GuzzleClient
{
    public function __construct($apiKey, $lang, $option)
    {
        parent::__construct($apiKey, $lang, $option);
    }
}
