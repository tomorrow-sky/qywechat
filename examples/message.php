<?php

$app = require __DIR__ . '/app.php';

/** @var \Tsky\Qywechat\Api\Message $message */
$message = $app->get('message');

$receiver = new \Tsky\Qywechat\Message\Receiver();
$receiver->setUser('userid1');
$receiver->setParty([1024, 2048]);
$receiver->setTag([1024, 2048]);

try {
    $text = new \Tsky\Qywechat\Message\Text("你的快递已到，请携带工卡前往邮件中心领取。\n出发前可查看<a href=\"http://work.weixin.qq.com\">邮件中心视频实况</a>，聪明避开排队。");
    $message->send($receiver, $text, true);
} catch (Exception $e) {
}

try {
    $image = new \Tsky\Qywechat\Message\Image('MEDIA_ID');
    $message->send($receiver, $image);
} catch (Exception $e) {
}

try {
    $voice = new \Tsky\Qywechat\Message\Voice('MEDIA_ID');
    $message->send($receiver, $voice);
} catch (Exception $e) {
}

try {
    $video = new \Tsky\Qywechat\Message\Video('MEDIA_ID', 'Title', 'Description');
    $message->send($receiver, $video);
} catch (Exception $e) {
}

try {
    $file = new \Tsky\Qywechat\Message\File('MEDIA_ID');
    $message->send($receiver, $file);
} catch (Exception $e) {
}

try {
    $textCard = new \Tsky\Qywechat\Message\TextCard('领奖通知', "<div class=\"gray\">2016年9月26日</div><div class=\"normal\">恭喜你抽中iPhone 7一台，领奖码：xxxx</div><div class=\"highlight\">请于2016年10月10日前联系行政同事领取</div>", 'URL', '更多');
    $message->send($receiver, $textCard);
} catch (Exception $e) {
}

try {
    $news = new \Tsky\Qywechat\Message\News([
        new \Tsky\Qywechat\Message\Article('中秋节礼品领取', 'URL', '今年中秋节公司有豪礼相送', 'http://res.mail.qq.com/node/ww/wwopenmng/images/independent/doc/test_pic_msg1.png', '更多')
    ]);
    $message->send($receiver, $news);
} catch (Exception $e) {
}

try {
    $news = new \Tsky\Qywechat\Message\MPNews([
        new \Tsky\Qywechat\Message\MPArticle('Title', 'MEDIA_ID', 'Content', 'Author', 'URL', 'Digest description')
    ]);
    $message->send($receiver, $news);
} catch (Exception $e) {
}
