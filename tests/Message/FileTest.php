<?php

namespace Tsky\Qywechat\Tests\Message;

use Tsky\Qywechat\Message\File;
use Tsky\Qywechat\Tests\TestCase;

class FileTest extends TestCase
{
    /**
     * @var File
     */
    protected $file;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        parent::setUp();

        $this->file = new File('media_id');
    }

    /**
     * @return void
     */
    public function testFormatForResponse()
    {
        $this->assertEquals([
            'msgtype' => 'file',
            'file' => [
                'media_id' => 'media_id'
            ]
        ], $this->file->formatForResponse());
    }
}
