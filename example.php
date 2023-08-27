<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

use EnterV\DiscordWebhooks\Embed;
use EnterV\DiscordWebhooks\Payload;
use EnterV\DiscordWebhooks\ValueObject\LongText;
use EnterV\DiscordWebhooks\ValueObject\ShortText;
use EnterV\DiscordWebhooks\ValueObject\Url;
use EnterV\DiscordWebhooks\WebhookClient;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

$embed = new Embed();
$embed->setDescription(new LongText('This is an embed'));

$url = new Url($_ENV['WEBHOOK_URL']);

$payload = new Payload();
$payload->setUsername(new ShortText('Example Webhook Bot'))
    ->setMessage(new LongText('This is a message'))
    ->setEmbed($embed)
;

$webhook = new WebhookClient();
$webhook->send($url, $payload);
