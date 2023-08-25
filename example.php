<?php

declare(strict_types=1);

require_once('vendor/autoload.php');

use EnterV\DiscordWebhooks\Embed;
use EnterV\DiscordWebhooks\Payload;
use EnterV\DiscordWebhooks\ValueObject\Description;
use EnterV\DiscordWebhooks\ValueObject\Message;
use EnterV\DiscordWebhooks\ValueObject\Username;
use EnterV\DiscordWebhooks\ValueObject\WebhookUrl;
use EnterV\DiscordWebhooks\WebhookClient;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

$embed = new Embed();
$embed->setDescription(new Description("This is an embed"));

$url = new WebhookUrl($_ENV["WEBHOOK_URL"]);

$payload = new Payload();
$payload->setUsername(new Username("Example Webhook Bot"))
    ->setMessage(new Message("This is a message"))
    ->setEmbed($embed);

$webhook = new WebhookClient();
$webhook->send($url, $payload);