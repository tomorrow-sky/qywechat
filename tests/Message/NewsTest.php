<?php

namespace Tsky\Qywechat\Tests\Message;

use Tsky\Qywechat\Message\Article;
use Tsky\Qywechat\Message\News;
use Tsky\Qywechat\Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * @var News
     */
    protected $news;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        parent::setUp();

        $this->news = new News([new Article('title', 'url', 'description', 'picurl', 'btntxt')]);
    }

    /**
     * @return void
     */
    public function testFormatForReply()
    {
        $this->assertEquals([
            'MsgType' => 'news',
            'ArticleCount' => 1,
            'Articles' => [
                [
                    'Title' => 'title',
                    'Description' => 'description',
                    'PicUrl' => 'picurl',
                    'Url' => 'url'
                ]
            ]
        ], $this->news->formatForReply());
    }

    /**
     * @return void
     */
    public function testFormatForResponse()
    {
        $this->assertEquals([
            'msgtype' => 'news',
            'news' => [
                'articles' => [
                    [
                        'title' => 'title',
                        'description' => 'description',
                        'url' => 'url',
                        'picurl' => 'picurl',
                        'btntxt' => 'btntxt'
                    ]
                ]
            ]
        ], $this->news->formatForResponse());
    }
}
