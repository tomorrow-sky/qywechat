<?php

namespace Tsky\Qywechat\Tests\Api;

use Mockery\MockInterface;
use Tsky\Qywechat\Api\Message;
use Tsky\Qywechat\Http\HttpClientInterface;
use Tsky\Qywechat\Message\Receiver;
use Tsky\Qywechat\Message\ResponseMessageInterface;
use Tsky\Qywechat\Tests\TestCase;

class MessageTest extends TestCase
{
    /**
     * @var MockInterface
     */
    protected $httpClient;

    /**
     * @var Message
     */
    protected $message;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        parent::setUp();

        $this->httpClient = \Mockery::mock(HttpClientInterface::class);

        $this->message = new Message();

        $this->message->setAgentId('AGENTID');
    }

    /**
     * @return void
     */
    public function testSend()
    {
        $receiver = \Mockery::mock(Receiver::class);

        $receiver->shouldReceive('get')
            ->once()
            ->withNoArgs()
            ->andReturn(['foo' => 'bar']);

        $responseFormatter = \Mockery::mock(ResponseMessageInterface::class);

        $responseFormatter->shouldReceive('formatForResponse')
            ->once()
            ->withNoArgs()
            ->andReturn(['baz' => 'foo']);

        $this->httpClient->shouldReceive('postJson')
            ->once()
            ->with('message/send', ['agentid' => 'AGENTID', 'foo' => 'bar', 'baz' => 'foo', 'safe' => 0])
            ->andReturn(['errcode' => 0]);

        $this->message->setHttpClient($this->httpClient);

        $this->assertEquals(['errcode' => 0], $this->message->send($receiver, $responseFormatter));
    }
}
