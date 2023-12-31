<?php

namespace Tsky\Qywechat\Traits;

use Tsky\Qywechat\Http\HttpClientInterface;

trait HttpClientTrait
{
    /**
     * @var HttpClientInterface
     */
    protected $httpClient;

    /**
     * @param HttpClientInterface $httpClient
     */
    public function setHttpClient(HttpClientInterface $httpClient): void
    {
        $this->httpClient = $httpClient;
    }
}
