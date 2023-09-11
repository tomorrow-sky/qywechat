<?php

$app = require __DIR__ . '/app.php';

/** @var \Tsky\Qywechat\ApiCache\Token $token */
$token = $app->get('token');

try {
    $token->get();
} catch (\Psr\SimpleCache\InvalidArgumentException $e) {
}

try {
    $token->get(true);
} catch (\Psr\SimpleCache\InvalidArgumentException $e) {
}
