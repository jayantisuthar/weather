<?php

namespace DashCode\Traits;

trait LocationsAPI
{
    public function getAdminAreaList($countryCode)
    {
        $url = $this->base_url.'/'.$countryCode;
        return $this->get($url);
    }

}
