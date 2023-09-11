<?php

namespace Tsky\Qywechat\Api;

use Tsky\Qywechat\Message\Receiver;
use Tsky\Qywechat\Message\ResponseMessageInterface;
use Tsky\Qywechat\Traits\AgentIdTrait;
use Tsky\Qywechat\Traits\HttpClientTrait;

class Message
{
    use HttpClientTrait, AgentIdTrait;

    /**
     * 发送应用消息
     *
     * @param Receiver $receiver
     * @param ResponseMessageInterface $responseMessage
     * @param bool $safe
     * @return array
     */
    public function send(Receiver $receiver, ResponseMessageInterface $responseMessage, bool $safe = false): array
    {
        return $this->httpClient->postJson('message/send', array_merge(
            ['agentid' => $this->agentId],
            $receiver->get(),
            $responseMessage->formatForResponse(),
            ['safe' => (int)$safe]
        ));
    }
}
