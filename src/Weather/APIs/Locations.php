<?php

namespace DashCode\APIs;

use DashCode\Services\GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Locations extends GuzzleClient
{
    public function __construct($apiKey, $lang, $option)
    {
        parent::__construct($apiKey, $lang, $option);
    }

    /**
     * @param $countryCode
     * @param $offset
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function adminAreaListInCountry($countryCode, $offset = null): ResponseInterface
    {
        if ($offset)
            $this->option['query']['offset'] = $offset;

        $url = resolveUrl('location.locations_list.admin_areas', $countryCode);
        return $this->get($url);
    }

    /**
     * @param $regionCode
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function countriesListInRegion($regionCode): ResponseInterface
    {
        $url = resolveUrl('location.locations_list.country_list', $regionCode);
        return $this->get($url);
    }

    /**
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function regionsList(): ResponseInterface
    {
        $url = resolveUrl('location.locations_list.region_list');
        return $this->get($url);
    }

    /**
     * @param $group
     * @param bool $details
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function topCitiesListByGroup($group, bool $details = false): ResponseInterface
    {
        $this->option['query']['details'] = $details;

        $url = resolveUrl('location.locations_list.top_city_list', $group);
        return $this->get($url);
    }

    /**
     * @param string $search
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function autoCompleteSearch(string $search): ResponseInterface
    {
        $this->option['query']['q'] = $search;

        $url = resolveUrl('location.auto_complete.search');
        return $this->get($url);
    }

    /**
     * @param $locationKey
     * @param bool $details
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function neighborCitiesByLocation($locationKey, bool $details = false): ResponseInterface
    {
        $this->option['query']['details'] = $details;

        $url = resolveUrl('location.location_key.city_neighbors', $locationKey);
        return $this->get($url);
    }

    /**
     * @param $locationKey
     * @param bool $details
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function searchByLocation($locationKey, bool $details = false): ResponseInterface
    {
        $this->option['query']['details'] = $details;

        $url = resolveUrl('location.location_key.search_by_key', $locationKey);
        return $this->get($url);
    }

    /**
     * @param string $search
     * @param null $countryCode
     * @param null $adminCode
     * @param bool $details
     * @param null $offset
     * @param null $alias
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function searchByCity(string $search, $countryCode = null, $adminCode = null, bool $details = false, $offset = null, $alias = null): ResponseInterface
    {
        if ($offset)
            $this->option['query']['offset'] = $offset;
        if ($alias)
            $this->option['query']['alias'] = $alias;

        if ($countryCode && $adminCode)
            $url = resolveUrl('location.text_search.city_search_by_countryCode_and_adminCode', $countryCode, $adminCode);
        else if ($countryCode)
            $url = resolveUrl('location.text_search.city_search_by_countryCode', $countryCode);
        else
            $url = resolveUrl('location.text_search.city_search');

        $this->option['query']['details'] = $details;
        $this->option['query']['q'] = $search;

        return $this->get($url);
    }

    /**
     * @param string $search
     * @param null $countryCode
     * @param null $adminCode
     * @param bool $details
     * @param null $typeID
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function searchByPOI(string $search, $countryCode = null, $adminCode = null, bool $details = false, $typeID = null): ResponseInterface
    {
        if ($typeID)
            $this->option['query']['type'] = $typeID;

        if ($countryCode && $adminCode)
            $url = resolveUrl('location.text_search.poi_search_by_countryCode_and_adminCode', $countryCode, $adminCode);
        else if ($countryCode)
            $url = resolveUrl('location.text_search.poi_search_by_countryCode', $countryCode);
        else
            $url = resolveUrl('location.text_search.poi_search');

        $this->option['query']['details'] = $details;
        $this->option['query']['q'] = $search;
        return $this->get($url);
    }

    /**
     * @param string $code
     * @param null $countryCode
     * @param bool $details
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function searchByPostalCode(string $code, $countryCode = null, bool $details = false): ResponseInterface
    {
        if ($countryCode)
            $url = resolveUrl('location.text_search.postal_code_by_countryCode', $countryCode);
        else
            $url = resolveUrl('location.text_search.postal_code');

        $this->option['query']['details'] = $details;
        $this->option['query']['q'] = $code;
        return $this->get($url);
    }

    /**
     * @param string $search
     * @param null $countryCode
     * @param null $adminCode
     * @param bool $details
     * @param null $offset
     * @param null $alias
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function searchByText(string $search, $countryCode = null, $adminCode = null, bool $details = false, $offset = null, $alias = null): ResponseInterface
    {
        if ($offset)
            $this->option['query']['offset'] = $offset;
        if ($alias)
            $this->option['query']['alias'] = $alias;

        if ($countryCode && $adminCode)
            $url = resolveUrl('location.text_search.text_search_by_countryCode_and_adminCode', $countryCode, $adminCode);
        else if ($countryCode)
            $url = resolveUrl('location.text_search.text_search_by_countryCode', $countryCode);
        else
            $url = resolveUrl('location.text_search.text_search');

        $this->option['query']['details'] = $details;
        $this->option['query']['q'] = $search;
        return $this->get($url);

    }

    /**
     * @param string $lat
     * @param string $long
     * @param bool $details
     * @param bool $toplevel
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function searchByGeoPosition(string $lat, string $long, bool $details = false, bool $toplevel = false): ResponseInterface
    {
        $url = resolveUrl('location.geo_position.search');

        $this->option['query']['toplevel'] = $toplevel;
        $this->option['query']['details'] = $details;
        $this->option['query']['q'] = "$lat,$long";
        return $this->get($url);
    }

    /**
     * @param string $ip
     * @param bool $details
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function searchByIPAddress(string $ip, bool $details = false): ResponseInterface
    {
        $this->option['query']['q'] = $ip;
        $this->option['query']['details'] = $details;
        $url = resolveUrl('location.ip_address.search');
        return $this->get($url);
    }

}
