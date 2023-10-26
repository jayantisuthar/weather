<?php

function getUrl($url)
{
    return match ($url) {
        'location' => array(
            'locations_list' => array(
                'admin_areas' => 'locations/v1/adminareas/{countryCode}',
                'country_list' => 'locations/v1/adminareas/{countryCode}',
                'region_list' => 'locations/v1/adminareas/{countryCode}',
                'top_city_list' => 'locations/v1/adminareas/{countryCode}',
            ),

            'auto_complete' => array(
                'search' => 'locations/v1/cities/autocomplete',
            ),

            'location_key' => array(
                'city_neighbors' => 'locations/v1/cities/neighbors/{locationKey}',
                'search_by_key' => 'locations/v1/{locationKey}',
            ),

            'text_search' => array(

                'city_search' => 'locations/v1/cities/search',
                'city_search_by_countryCode' => 'locations/v1/cities/{countryCode}/search',
                'city_search_by_countryCode_and_adminCode' => 'locations/v1/cities/{countryCode}/{adminCode}/search',

                'poi_search' => 'locations/v1/poi/search',
                'poi_search_by_countryCode' => 'locations/v1/poi/{countryCode}/search',
                'poi_search_by_countryCode_and_adminCode' => 'locations/v1/poi/{countryCode}/{adminCode}/search',

                'postal_code' => 'locations/v1/postalcodes/search',
                'postal_code_by_countryCode' => 'locations/v1/postalcodes/{countryCode}/search',

                'text_search' => 'locations/v1/search',
                'text_search_by_countryCode' => 'locations/v1/{countryCode}/search',
                'text_search_by_countryCode_and_adminCode' => 'locations/v1/{countryCode}/{adminCode}/search',

            ),
            'geo_position' => array(
                'search' => 'locations/v1/cities/geoposition/search',
            ),

            'ip_address' => array(
                'search' => 'locations/v1/cities/ipaddress',
            ),
        ),


        'forecast' => array(
            'daily' => array(
                '1_day' => 'forecasts/v1/daily/1day/{locationKey}',
                '5_day' => 'forecasts/v1/daily/5day/{locationKey}',
                '10_day' => 'forecasts/v1/daily/10day/{locationKey}',
                '15_day' => 'forecasts/v1/daily/15day/{locationKey}',
            ),
            'hourly' => array(
                '1_hour' => 'forecasts/v1/hourly/1hour/{locationKey}',
                '12_hour' => 'forecasts/v1/hourly/12hour/{locationKey}',
                '24_hour' => 'forecasts/v1/hourly/24hour/{locationKey}',
                '72_hour' => 'forecasts/v1/hourly/72hour/{locationKey}',
                '120_hour' => 'forecasts/v1/hourly/120hour/{locationKey}',
            )
        ),



    };
}
