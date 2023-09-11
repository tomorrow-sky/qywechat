<?php

namespace Tsky\Qywechat\Tests\Api;

use Mockery\MockInterface;
use Tsky\Qywechat\Api\AppChat;
use Tsky\Qywechat\Http\HttpClientInterface;
use Tsky\Qywechat\Message\ResponseMessageInterface;
use Tsky\Qywechat\Tests\TestCase;

class AppChatTest extends TestCase
{
    /**
     * @var MockInterface
     */
    protected $httpClient;

    /**
     * @var AppChat
     */
    protected $appChat;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        parent::setUp();

        $this->httpClient = \Mockery::mock(HttpClientInterface::class);

        $this->appChat = new AppChat();
    }

    /**
     * @return void
     */
    public function testCreate()
    {
        $this->httpClient->shouldReceive('postJson')
            ->once()
            ->with('appchat/create', ['foo' => 'bar'])
            ->andReturn(['errcode' => 0]);

        $this->appChat->setHttpClient($this->httpClient);

        $this->assertEquals(['errcode' => 0], $this->appChat->create(['foo' => 'bar']));
    }

    /**
     * @return void
     */
    public function testUpdate()
    {
        $this->httpClient->shouldReceive('postJson')
            ->once()
            ->with('appchat/update', ['foo' => 'bar'])
            ->andReturn(['errcode' => 0]);

        $this->appChat->setHttpClient($this->httpClient);

        $this->assertEquals(['errcode' => 0], $this->appChat->update(['foo' => 'bar']));
    }

    /**
     * @return void
     */
    public function testGet()
    {
        $this->httpClient->shouldReceive('get')
            ->once()
            ->with('appchat/get', ['chatid' => 'foo'])
            ->andReturn(['errcode' => 0]);

        $this->appChat->setHttpClient($this->httpClient);

        $this->assertEquals(['errcode' => 0], $this->appChat->get('foo'));
    }

    /**
     * @return void
     */
    public function testSend()
    {
        $responseFormatter = \Mockery::mock(ResponseMessageInterface::class);

        $responseFormatter->shouldReceive('formatForResponse')
            ->once()
            ->withNoArgs()
            ->andReturn(['foo' => 'bar']);

        $this->httpClient->shouldReceive('postJson')
            ->once()
            ->with('appchat/send', ['chatid' => 'id', 'foo' => 'bar', 'safe' => 0])
            ->andReturn(['errcode' => 0]);

        $this->appChat->setHttpClient($this->httpClient);

        $this->assertEquals(['errcode' => 0], $this->appChat->send('id', $responseFormatter));
    }
}
