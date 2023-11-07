<?php

namespace DashCode\APIs;

use DashCode\Services\GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Tropical extends GuzzleClient
{
    public function __construct($apiKey, $lang, $option)
    {
        parent::__construct($apiKey, false, $option);
    }

    /**
     * @param int $year
     * @param string|null $basinID
     * @param $governmentID
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function govtIssuedStormsWithYearBasinAndGovtID(int $year, string $basinID = null, $governmentID = null): ResponseInterface
    {

        if ($basinID and $governmentID)
            $url = resolveUrl('tropical.cyclone.gov_issue_year_basin_gov_id', $year, $basinID, $governmentID);
        else if ($basinID)
            $url = resolveUrl('tropical.cyclone.gov_issue_by_year_and_basin', $year, $basinID);
        else
            $url = resolveUrl('tropical.cyclone.gov_issue_by_year', $year);

        return $this->get($url);

    }

    /**
     * @param string|null $basinID
     * @param $governmentID
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function govtIssuedActiveStormsWithBasinAndGovtID(string $basinID = null, $governmentID = null): ResponseInterface
    {
        if ($basinID and $governmentID)
            $url = resolveUrl('tropical.cyclone.gov_issue_active_in_a_basin', $basinID, $governmentID);
        else if ($basinID)
            $url = resolveUrl('tropical.cyclone.gov_issue_active_in_basin', $basinID);
        else
            $url = resolveUrl('tropical.cyclone.gov_issue_active');

        return $this->get($url);
    }

    /**
     * @param string $version
     * @param int $year
     * @param string $basinID
     * @param $governmentID
     * @param bool $details
     * @param bool $radiigeometry
     * @param bool $includeLandmarks
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function allPositionsOfCyclone(string $version, int $year, string $basinID, $governmentID, bool $details = false, bool $radiigeometry = false, bool $includeLandmarks = true): ResponseInterface
    {

        $this->option['query']['details'] = $details;
        $this->option['query']['radiigeometry'] = $radiigeometry;
        $this->option['query']['includeLandmarks'] = $includeLandmarks;

        $url = resolveUrl('tropical.position.gov_issue_all_position', $version, $year, $basinID, $governmentID);
        return $this->get($url);

    }

    /**
     * @param int $year
     * @param string $basinID
     * @param $governmentID
     * @param bool $details
     * @param bool $radiigeometry
     * @param bool $includeLandmarks
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function currentPositionOfCyclone(int $year, string $basinID, $governmentID, bool $details = false, bool $radiigeometry = false, bool $includeLandmarks = true): ResponseInterface
    {
        $this->option['query']['details'] = $details;
        $this->option['query']['radiigeometry'] = $radiigeometry;
        $this->option['query']['includeLandmarks'] = $includeLandmarks;
        $url = resolveUrl('tropical.position.gov_issue_current', $year, $basinID, $governmentID);
        return $this->get($url);

    }

    /**
     * @param int $year
     * @param string $basinID
     * @param $governmentID
     * @param bool $details
     * @param bool $radiigeometry
     * @param bool $includeLandmarks
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function forecastOfCyclone(int $year, string $basinID, $governmentID, bool $details = false, bool $radiigeometry = false, bool $includeLandmarks = true): ResponseInterface
    {
        $this->option['query']['details'] = $details;
        $this->option['query']['radiigeometry'] = $radiigeometry;
        $this->option['query']['includeLandmarks'] = $includeLandmarks;
        $url = resolveUrl('tropical.forecast.year_basin_gov_id', $year, $basinID, $governmentID);

        return $this->get($url);
    }

}
