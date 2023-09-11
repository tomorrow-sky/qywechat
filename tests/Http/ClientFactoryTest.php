<?php

namespace Tsky\Qywechat\Tests\Http;

use GuzzleHttp\Client;
use Psr\Log\LoggerInterface;
use Tsky\Qywechat\ApiCache\Token;
use Tsky\Qywechat\Http\ClientFactory;
use Tsky\Qywechat\Tests\TestCase;

class ClientFactoryTest extends TestCase
{
    /**
     * @return void
     */
    public function testCreate()
    {
        $this->assertInstanceOf(Client::class, ClientFactory::create(\Mockery::mock(LoggerInterface::class)));
    }

    /**
     * @return void
     */
    public function testCreateWithToken()
    {
        $this->assertInstanceOf(Client::class, ClientFactory::create(
            \Mockery::mock(LoggerInterface::class),
            \Mockery::mock(Token::class)
        ));
    }
}
