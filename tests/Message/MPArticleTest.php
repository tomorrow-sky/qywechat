<?php

namespace Tsky\Qywechat\Tests\Message;

use Tsky\Qywechat\Message\MPArticle;
use Tsky\Qywechat\Tests\TestCase;

class MPArticleTest extends TestCase
{
    /**
     * @var MPArticle
     */
    protected $article;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        parent::setUp();

        $this->article = new MPArticle('title', 'thumb_media_id', 'content', 'author', 'content_source_url', 'digest');
    }

    /**
     * @return void
     */
    public function testFormatForResponse()
    {
        $this->assertEquals([
            'title' => 'title',
            'thumb_media_id' => 'thumb_media_id',
            'author' => 'author',
            'content_source_url' => 'content_source_url',
            'content' => 'content',
            'digest' => 'digest'
        ], $this->article->formatForResponse());
    }
}
