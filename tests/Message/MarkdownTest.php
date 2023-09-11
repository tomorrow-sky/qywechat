<?php

namespace Tsky\Qywechat\Tests\Message;

use Tsky\Qywechat\Message\Markdown;
use Tsky\Qywechat\Tests\TestCase;

class MarkdownTest extends TestCase
{
    /**
     * @var Markdown
     */
    protected $markdown;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        parent::setUp();

        $this->markdown = new Markdown('content');
    }

    /**
     * @return void
     */
    public function testFormatForResponse()
    {
        $this->assertEquals([
            'msgtype'  => 'markdown',
            'markdown' => [
                'content' => 'content'
            ]
        ], $this->textCard->formatForResponse());
    }
}
