<?php

$app = require __DIR__ . '/app.php';

/** @var \Tsky\Qywechat\JSSdk $jssdk */
$jssdk = $app->get('jssdk');

try {
    var_dump($jssdk->getConfig('URL'));
} catch (\Psr\SimpleCache\InvalidArgumentException $e) {
}

try {
    var_dump($jssdk->getChooseInvoiceConfig());
} catch (\Psr\SimpleCache\InvalidArgumentException $e) {
}
