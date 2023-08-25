<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Interface\WebhookClient;

use EnterV\DiscordWebhooks\Interface\Payload\GetPayloadInterface;
use EnterV\Voi\StringVoInterface;
use Psr\Http\Message\ResponseInterface;

interface WebhookClientInterface
{
    public function send(StringVoInterface $url, GetPayloadInterface $payload): ResponseInterface;
}
