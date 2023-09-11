<?php

namespace Tsky\Qywechat\Tests\Message;

use Tsky\Qywechat\Message\Article;
use Tsky\Qywechat\Tests\TestCase;

class ArticleTest extends TestCase
{
    /**
     * @var Article
     */
    protected $article;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        parent::setUp();

        $this->article = new Article('title', 'url', 'description', 'picurl', 'btntxt');
    }

    /**
     * @return void
     */
    public function testFormatForReply()
    {
        $this->assertEquals([
            'Title' => 'title',
            'Description' => 'description',
            'PicUrl' => 'picurl',
            'Url' => 'url'
        ], $this->article->formatForReply());
    }

    /**
     * @return void
     */
    public function testFormatForResponse()
    {
        $this->assertEquals([
            'title' => 'title',
            'description' => 'description',
            'url' => 'url',
            'picurl' => 'picurl',
            'btntxt' => 'btntxt'
        ], $this->article->formatForResponse());
    }
}
