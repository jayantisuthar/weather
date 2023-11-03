<?php

namespace DashCode\APIs;

use DashCode\Services\GuzzleClient;

class CurrentConditions  extends GuzzleClient
{
    public function __construct($apiKey, $lang)
    {
        parent::__construct($apiKey, $lang);
    }

}
