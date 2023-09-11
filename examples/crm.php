<?php

$app = require __DIR__ . '/app.php';

/** @var \Tsky\Qywechat\Api\CRM $crm */
$crm = $app->get('crm');

try {
    $crm->getExternalContact('EXTERNAL_USERID');
} catch (Exception $e) {
}
