<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

use EnterV\DiscordWebhooks\Embed;
use EnterV\DiscordWebhooks\Payload;
use EnterV\DiscordWebhooks\WebhookClient;

$embed = new Embed();
$embed->setDescription('This is an embed');

$url = 'https://YOUR_WEBHOOKS_URL';

$payload = new Payload();
$payload->setUsername('Example Webhook Bot')
    ->setMessage('This is a message')
    ->setEmbed($embed)
;

$webhook = new WebhookClient();
$webhook->send($url, $payload);
