<?php

function getUrl($url)
{
    return match ($url) {
        'admin_are_list' => [
            'url' => 'locations/v1/adminareas/{countryCode}',
            'required' => 'countryCode',
            'params' => [

            ]]
    };
}
