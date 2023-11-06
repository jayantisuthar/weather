<?php

namespace DashCode\APIs;

use DashCode\Services\GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Translations  extends GuzzleClient
{
    public function __construct($apiKey, $lang, $option)
    {
        parent::__construct($apiKey, $lang, $option);
    }

    /**
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function listAllLanguages(): ResponseInterface
    {
        $url = resolveUrl('translation.list_of_lang');
        return $this->get($url, ['query' => ['language' => false]]);

    }

    /**
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function listAvailableTranslationGroup(): ResponseInterface
    {
        $url = resolveUrl('translation.groups_of_phrases');
        return $this->get($url, ['query' => ['language' => false]]);

    }

    /**
     * @param int $groupID
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function listOfTranslationsForSpecificGroup(int $groupID): ResponseInterface
    {
        $url = resolveUrl('translation.all_phrases_specific_group', $groupID);
        return $this->get($url);

    }
}
