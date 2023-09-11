<?php

namespace Tsky\Qywechat\Tests;

use Tsky\Qywechat\App;

class AppTest extends TestCase
{
    /**
     * @var App
     */
    protected $app;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        parent::setUp();

        $this->app = new App(['corp_id' => 'corpid', 'secret' => 'secret']);
    }

    /**
     * @param $expected
     * @param $id
     * @throws \Exception
     *
     * @dataProvider getProvider
     */
    public function testGet($expected, $id)
    {
        $this->assertInstanceOf($expected, $this->app->get($id));
    }

    /**
     * @return array
     */
    public function getProvider()
    {
        return [
            [\Tsky\Qywechat\ApiCache\Token::class, 'token'],
            [\Tsky\Qywechat\Callback::class, 'callback'],
            [\Tsky\Qywechat\Api\Agent::class, 'agent'],
            [\Tsky\Qywechat\Api\AppChat::class, 'appChat'],
            [\Tsky\Qywechat\Api\Batch::class, 'batch'],
            [\Tsky\Qywechat\Api\CheckIn::class, 'checkIn'],
            [\Tsky\Qywechat\Api\Corp::class, 'corp'],
            [\Tsky\Qywechat\Api\CRM::class, 'crm'],
            [\Tsky\Qywechat\Api\Department::class, 'department'],
            [\Tsky\Qywechat\Api\Invoice::class, 'invoice'],
            [\Tsky\Qywechat\Api\Media::class, 'media'],
            [\Tsky\Qywechat\Api\Menu::class, 'menu'],
            [\Tsky\Qywechat\Api\Message::class, 'message'],
            [\Tsky\Qywechat\Api\Tag::class, 'tag'],
            [\Tsky\Qywechat\Api\User::class, 'user'],
            [\Tsky\Qywechat\ApiCache\JsApiTicket::class, 'jsApiTicket'],
            [\Tsky\Qywechat\ApiCache\Ticket::class, 'ticket'],
            [\Tsky\Qywechat\JSSdk::class, 'jssdk'],
        ];
    }
}
