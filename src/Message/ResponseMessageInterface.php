<?php

namespace Tsky\Qywechat\Message;

interface ResponseMessageInterface
{
    /**
     * @return array
     */
    public function formatForResponse(): array;
}
