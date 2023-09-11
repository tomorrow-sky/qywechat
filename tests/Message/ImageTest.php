<?php

namespace Tsky\Qywechat\Tests\Message;

use Tsky\Qywechat\Message\Image;
use Tsky\Qywechat\Tests\TestCase;

class ImageTest extends TestCase
{
    /**
     * @var Image
     */
    protected $image;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        parent::setUp();

        $this->image = new Image('media_id');
    }

    /**
     * @return void
     */
    public function testFormatForReply()
    {
        $this->assertEquals([
            'MsgType' => 'image',
            'Image' => [
                'MediaId' => 'media_id'
            ]
        ], $this->image->formatForReply());
    }

    /**
     * @return void
     */
    public function testFormatForResponse()
    {
        $this->assertEquals([
            'msgtype' => 'image',
            'image' => [
                'media_id' => 'media_id'
            ]
        ], $this->image->formatForResponse());
    }
}
