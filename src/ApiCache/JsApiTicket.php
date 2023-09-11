<?php

namespace Tsky\Qywechat\ApiCache;

use Tsky\Qywechat\Traits\HttpClientTrait;
use Tsky\Qywechat\Traits\SecretTrait;

class JsApiTicket extends AbstractApiCache
{
    use SecretTrait, HttpClientTrait;

    /**
     * @return string
     */
    protected function getCacheKey(): string
    {
        $unique = md5($this->secret);

        return md5('Tsky\Qywechat.api.js_ticket.' . $unique);
    }

    /**
     * @return string
     */
    protected function getFromServer(): string
    {
        $data = $this->httpClient->get('get_jsapi_ticket');

        return $data['ticket'];
    }
}
