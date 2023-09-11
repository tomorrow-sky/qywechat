<?php

namespace Tsky\Qywechat\Tests\ApiCache;

use Tsky\Qywechat\ApiCache\JsApiTicket;
use Tsky\Qywechat\Http\HttpClientInterface;
use Tsky\Qywechat\Tests\TestCase;

class JsTicketTest extends TestCase
{
    /**
     * @var JsApiTicket
     */
    protected $jsTicket;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        parent::setUp();

        $this->jsTicket = new JsApiTicket();
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    public function testGetCacheKey()
    {
        $this->jsTicket->setSecret('foo');

        $this->assertEquals('4ce02e279b2db945760a47d20069a2f2', $this->callMethod($this->jsTicket, 'getCacheKey'));
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    public function testGetFromServer()
    {
        $httpClient = \Mockery::mock(HttpClientInterface::class);

        $httpClient->shouldReceive('get')
            ->once()
            ->with('get_jsapi_ticket')
            ->andReturn(['ticket' => 'foo']);

        $this->jsTicket->setHttpClient($httpClient);

        $this->assertEquals('foo', $this->callMethod($this->jsTicket, 'getFromServer'));
    }
}
