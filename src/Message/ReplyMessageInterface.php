<?php

namespace Tsky\Qywechat\Message;

interface ReplyMessageInterface
{
    /**
     * @return array
     */
    public function formatForReply(): array;
}
