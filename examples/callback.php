<?php

$app = require __DIR__ . '/app.php';

/** @var \Tsky\Qywechat\Callback $callback */
$callback = $app->get('callback');

switch ($callback->get('MsgType')) {
    case 'text':
        echo $callback->reply(new \Tsky\Qywechat\Message\Text($callback->get('Content'))); // 文本消息
        break;
    case 'image':
        echo $callback->reply(new \Tsky\Qywechat\Message\Image($callback->get('MediaId'))); // 图片消息
        break;
    case 'voice':
        echo $callback->reply(new \Tsky\Qywechat\Message\Voice($callback->get('MediaId'))); // 语音消息
        break;
    case 'video':
        echo $callback->reply(new \Tsky\Qywechat\Message\Video($callback->get('MediaId'), 'Title', 'Description')); // 视频消息
        break;
    default:
        $article = new \Tsky\Qywechat\Message\Article('title', 'http://www.soso.com', 'description', 'http://res.mail.qq.com/node/ww/wwopenmng/images/independent/doc/test_pic_msg1.png');
        echo $callback->reply(new \Tsky\Qywechat\Message\News([$article])); // 图文消息
        break;
}
