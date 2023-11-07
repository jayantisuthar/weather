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

        $this->option['query']['language'] = false;
        $url = resolveUrl('translation.list_of_lang');
        return $this->get($url);

    }

    /**
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function listAvailableTranslationGroup(): ResponseInterface
    {
        $this->option['query']['language'] = false;
        $url = resolveUrl('translation.groups_of_phrases');
        return $this->get($url);

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
