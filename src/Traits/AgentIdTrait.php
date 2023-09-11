<?php

namespace Tsky\Qywechat\Traits;

trait AgentIdTrait
{
    /**
     * @var string
     */
    protected $agentId;

    /**
     * @param string $agentId
     */
    public function setAgentId($agentId): void
    {
        $this->agentId = $agentId;
    }
}
