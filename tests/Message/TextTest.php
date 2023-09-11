<?php

namespace Tsky\Qywechat\Tests\Message;

use Tsky\Qywechat\Message\Text;
use Tsky\Qywechat\Tests\TestCase;

class TextTest extends TestCase
{
    /**
     * @var Text
     */
    protected $text;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        parent::setUp();

        $this->text = new Text('content');
    }

    /**
     * @return void
     */
    public function testFormatForReply()
    {
        $this->assertEquals([
            'MsgType' => 'text',
            'Content' => 'content'
        ], $this->text->formatForReply());
    }

    /**
     * @return void
     */
    public function testFormatForResponse()
    {
        $this->assertEquals([
            'msgtype' => 'text',
            'text' => [
                'content' => 'content'
            ]
        ], $this->text->formatForResponse());
    }
}
