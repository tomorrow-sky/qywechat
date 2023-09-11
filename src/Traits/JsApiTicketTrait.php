<?php

namespace Tsky\Qywechat\Traits;

use Tsky\Qywechat\ApiCache\JsApiTicket;

trait JsApiTicketTrait
{
    /**
     * @var JsApiTicket
     */
    protected $jsApiTicket;

    /**
     * @param JsApiTicket $jsApiTicket
     */
    public function setJsApiTicket(JsApiTicket $jsApiTicket): void
    {
        $this->jsApiTicket = $jsApiTicket;
    }
}
