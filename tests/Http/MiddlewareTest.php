<?php

namespace Tsky\Qywechat\Tests\Http;

use Psr\Log\LoggerInterface;
use Tsky\Qywechat\ApiCache\Token;
use Tsky\Qywechat\Http\Middleware;
use Tsky\Qywechat\Tests\TestCase;

class MiddlewareTest extends TestCase
{
    /**
     * @return void
     */
    public function testAuth()
    {
        $this->assertInstanceOf(\Closure::class, Middleware::auth(\Mockery::mock(Token::class)));
    }

    /**
     * @return void
     */
    public function testLog()
    {
        $this->assertInstanceOf(\Closure::class, Middleware::log(\Mockery::mock(LoggerInterface::class)));
    }

    /**
     * @return void
     */
    public function testRetry()
    {
        $this->assertInstanceOf(\Closure::class, Middleware::retry(\Mockery::mock(LoggerInterface::class)));
    }

    /**
     * @return void
     */
    public function testResponse()
    {
        $this->assertInstanceOf(\Closure::class, Middleware::response());
    }
}
