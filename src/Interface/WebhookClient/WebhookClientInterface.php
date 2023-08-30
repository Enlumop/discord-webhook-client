<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Interface\WebhookClient;

use EnterV\DiscordWebhooks\Interface\Payload\GetPayloadInterface;
use Psr\Http\Message\ResponseInterface;

interface WebhookClientInterface
{
    public function send(string $url, GetPayloadInterface $payload): ResponseInterface;
}
