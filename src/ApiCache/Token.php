<?php

namespace Tsky\Qywechat\ApiCache;

use Tsky\Qywechat\Traits\CorpIdTrait;
use Tsky\Qywechat\Traits\HttpClientTrait;
use Tsky\Qywechat\Traits\SecretTrait;

class Token extends AbstractApiCache
{
    use CorpIdTrait, SecretTrait, HttpClientTrait;

    /**
     * @return string
     */
    protected function getCacheKey(): string
    {
        $unique = md5($this->secret);

        return md5('Tsky\Qywechat.api.token.' . $unique);
    }

    /**
     * @return string
     */
    protected function getFromServer(): string
    {
        $data = $this->httpClient->get('gettoken', ['corpid' => $this->corpId, 'corpsecret' => $this->secret]);

        return $data['access_token'];
    }
}
