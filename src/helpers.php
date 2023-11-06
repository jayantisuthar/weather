<?php

function resolveUrl($url, ...$args)
{
    $url = getUrl($url);
    return $url;
}

function getUrl($url)
{
    $urls = array(

        'alerts' => array(
            'specific' => array(
                'location' => 'alerts/v1/{locationKey}'
            )
        ),

        'current_condition' => array(
            'location_wise' => array(
                'location' => 'currentconditions/v1/{locationKey}'
            ),
            'top_cities' => array(
                'group' => 'currentconditions/v1/topcities/{group}'
            ),
            'historical' => array(
                'past_6_hour' => 'currentconditions/v1/{locationKey}/historical',
                'past_24_hour' => 'currentconditions/v1/{locationKey}/historical/24',
            ),
        ),

        'forecast' => array(
            'daily' => array(
                'day' => 'forecasts/v1/daily/{day}day/{locationKey}'
            ),
            'hourly' => array(
                'hour' => 'forecasts/v1/hourly/{hour}hour/{locationKey}'
            )
        ),

        'imagery' => array(
            'radar' => array(
                'location' => 'imagery/v1/maps/radsat/{resolution}/{locationKey}'
            )
        ),

        'indices' => array(
            'day_wise' => array(
                'specific' => 'indices/v1/daily/{day}day/{locationKey}/{groupId}',
                'group' => 'indices/v1/daily/{day}day/{locationKey}/groups/{indexId}',
                'all' => 'indices/v1/daily/{day}day/{locationKey}',
            ),
            'metadata_list' => array(
                'all_daily_indices' => 'indices/v1/daily',
                'all_index_group' => 'indices/v1/daily/groups',
                'specific_group_all_indices' => 'indices/v1/daily/groups/{ID}',
                'specific_index_type' => 'indices/v1/daily/{ID}',
            )
        ),

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

        'minute_cast_by' => array(
            'lat_long' => 'forecasts/v1/minute'
        ),

        'translation' => array(
            'list_of_lang' => 'translations/v1/languages',
            'groups_of_phrases' => 'translations/v1/groups',
            'all_phrases_specific_group' => 'translations/v1/groups/{groupID}'
        ),

        'tropical' => array(
            'cyclone' => array(
                // govt issue notification cyclone
                'gov_issue_by_year' => 'tropical/v1/gov/storms/{yyyy}',
                'gov_issue_active_in_a_basin' => 'tropical/v1/gov/storms/active/{basinID}/{governmentID}',
                'gov_issue_active' => 'tropical/v1/gov/storms/active',
                'gov_issue_by_year_and_basin' => 'tropical/v1/gov/storms/{yyyy}/{basinID}',
                'gov_issue_year_basin_gov_id' => 'tropical/v1/gov/storms/{yyyy}/{basinID}/{governmentID}',
                'gov_issue_active_in_basin' => 'tropical/v1/gov/storms/active/{basinId}',

                'by_year_basin_and_id' => 'tropical/v1/storms/{yyyy}/{basinId}/{depressionId}',
                'by_year_and_basin' => 'tropical/v1/storms/{yyyy}/{basinId}',
                'by_basin_and_id' => 'tropical/v1/storms/active/{basinId}/{depressionId}',
                'by_basin_id' => 'tropical/v1/storms/active/{basinId}',
                'active' => 'tropical/v1/storms/active',
            ),
            'position' => array(
                'gov_issue_all_position' => 'tropical/{version}/gov/storms/{yyyy}/{basinID}/{governmentID}/positions',
                'gov_issue_current' => 'tropical/v1/gov/storms/{yyyy}/{basinID}/{governmentID}/positions/current',
                'all_positions' => 'tropical/v1/storms/{yyyy}/{basinId}/{depressionId}/positions',
                'current_position' => 'tropical/v1/storms/{yyyy}/{basinId}/{depressionId}/positions/current',
            ),
            'forecast' => array(
                'year_basin_gov_id' => 'tropical/v1/gov/storms/{yyyy}/{basinID}/{governmentID}/forecasts',
                'specific_tropical' => 'tropical/v1/storms/{yyyy}/{basinId}/{depressionId}/forecasts',
            ),
        ),

        'weather_alarm' => array(
            'dayWise' =>  'alarms/v1/{day}day/{locationKey}'
        ),

    );

    return resolveArray($urls, $url);
}

function resolveArray(array $a, $path, $default = null)
{
    $current = $a;
    $p = strtok($path, '.');

    while ($p !== false) {
        if (!isset($current[$p])) {
            throw new \Exception('Invalid Path Access, array key does not exists ' . $path);
        }
        $current = $current[$p];
        $p = strtok('.');
    }

    return $current;
}
