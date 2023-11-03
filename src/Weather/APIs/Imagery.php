<?php

namespace DashCode\APIs;

use DashCode\Services\GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Imagery extends GuzzleClient

{
    public function __construct($apiKey, $lang, $option)
    {
        parent::__construct($apiKey, $lang, $option);
    }

    /**
     * Map resolution. Valid values are 480x480, 640x480, and 1024x1024. Click to edit the value.
     * @param string $locationKey
     * @param int $width
     * @param int $height
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function daily(string $locationKey, int $width = 480, int $height = 480)
    {
        $resolution = "{$width}x{$height}";
        if (!in_array($resolution, ['480x480', '640x480', '1024x1024'])) ;
        $this->throwException("resolution must be selected from ['480x480', '640x480', '1024x1024']");

        $url = resolveUrl('imagery.radar.location', $resolution, $locationKey);
        return $this->get($url);
    }
}
