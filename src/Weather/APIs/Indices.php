<?php

namespace DashCode\APIs;

use DashCode\Services\GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Indices extends GuzzleClient
{
    public function __construct($apiKey, $lang, $option)
    {
        parent::__construct($apiKey, $lang, $option);
    }

    /**
     * @param string $locationKey
     * @param int $day
     * @param int $groupId
     * @param bool $details
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function locationSpecificGroup(string $locationKey, int $day, int $groupId, bool $details = false)
    {
        if (!in_array($day, [1, 5, 10, 15]))
            $this->throwException("day must be selected from [1, 5, 10, 15]");

        $this->option['query']['details'] = $details;

        $url = resolveUrl('indices.day_wise.specific', $day, $locationKey, $groupId);
        return $this->get($url);
    }

    /**
     * @param string $locationKey
     * @param int $day
     * @param int $indexId
     * @param bool $details
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function locationSpecificIndex(string $locationKey, int $day, int $indexId, bool $details = false)
    {
        if (!in_array($day, [1, 5, 10, 15]))
            $this->throwException("day must be selected from [1, 5, 10, 15]");
        $this->option['query']['details'] = $details;
        $url = resolveUrl('indices.day_wise.group', $day, $locationKey, $indexId);
        return $this->get($url);
    }

    /**
     * @param string $locationKey
     * @param int $day
     * @param bool $details
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function locationAllIndices(string $locationKey, int $day, bool $details = false)
    {
        if (!in_array($day, [1, 5, 10, 15]))
            $this->throwException("day must be selected from [1, 5, 10, 15]");
        $this->option['query']['details'] = $details;
        $url = resolveUrl('indices.day_wise.all', $day, $locationKey);
        return $this->get($url);
    }

    /**
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function allDailyIndicesMetaData()
    {
        $url = resolveUrl('indices.metadata_list.all_daily_indices');
        return $this->get($url);
    }

    /**
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function allIndexGroupMetaData()
    {
        $url = resolveUrl('indices.metadata_list.all_index_group');
        return $this->get($url);
    }

    /**
     * @param $ID
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function specificGroupAllIndicesMetaData($ID)
    {
        $url = resolveUrl('indices.metadata_list.specific_group_all_indices', $ID);
        return $this->get($url);
    }

    /**
     * @param $ID
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function specificIndexMetaData($ID)
    {
        $url = resolveUrl('indices.metadata_list.specific_index_type', $ID);
        return $this->get($url);
    }
}
