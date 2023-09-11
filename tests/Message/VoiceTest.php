<?php

namespace Tsky\Qywechat\Tests\Message;

use Tsky\Qywechat\Message\Voice;
use Tsky\Qywechat\Tests\TestCase;

class VoiceTest extends TestCase
{
    /**
     * @var Voice
     */
    protected $voice;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        parent::setUp();

        $this->voice = new Voice('media_id');
    }

    /**
     * @return void
     */
    public function testFormatForReply()
    {
        $this->assertEquals([
            'MsgType' => 'voice',
            'Voice' => [
                'MediaId' => 'media_id'
            ]
        ], $this->voice->formatForReply());
    }

    /**
     * @return void
     */
    public function testFormatForResponse()
    {
        $this->assertEquals([
            'msgtype' => 'voice',
            'voice' => [
                'media_id' => 'media_id'
            ]
        ], $this->voice->formatForResponse());
    }
}
