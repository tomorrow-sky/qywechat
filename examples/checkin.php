<?php

$app = require __DIR__ . '/app.php';

/** @var \Tsky\Qywechat\Api\CheckIn $checkIn */
$checkIn = $app->get('checkIn');

try {
    $checkIn->getOption(1511971200, ['james', 'paul']);
} catch (Exception $e) {
}

try {
    $checkIn->getData(\Tsky\Qywechat\Api\CheckIn::TYPE_ALL, 1492617600, 1492790400, ['james', 'paul']);
} catch (Exception $e) {
}
