<?php

namespace Tsky\Qywechat\Traits;

trait SecretTrait
{
    /**
     * @var string
     */
    protected $secret;

    /**
     * @param string $secret
     */
    public function setSecret(string $secret): void
    {
        $this->secret = $secret;
    }

}
