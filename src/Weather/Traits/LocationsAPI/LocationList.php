<?php

namespace Weather\Traits\LocationsAPI;

trait LocationList
{
    public function getAdminAreaList($countryCode)
    {
        $url = $this->base_url.'/'.$countryCode;
        return $this->get($url);
    }

}
