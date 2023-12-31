<?php

$app = require __DIR__ . '/app.php';

/** @var \Tsky\Qywechat\ApiCache\Ticket $ticket */
$ticket = $app->get('ticket');

try {
    $ticket->get();
} catch (\Psr\SimpleCache\InvalidArgumentException $e) {
}

try {
    $ticket->get(true);
} catch (\Psr\SimpleCache\InvalidArgumentException $e) {
}
