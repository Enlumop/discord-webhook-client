<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Interface\WebhookClient;

use EnterV\DiscordWebhooks\Interface\Payload\GetPayloadInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * A full-fledged interface for the WebhookClient class.
 *
 * @see https://github.com/EnterVPL/discord-webhooks/blob/master/docs/WebhookClient.md
 */
interface WebhookClientInterface
{
    /**
     * Execute Webhook.
     *
     * @see https://discord.com/developers/docs/resources/webhook#execute-webhook
     *
     * @param array<string, mixed> $options - see https://docs.guzzlephp.org/en/stable/request-options.html
     *
     * @throws \EnterV\DiscordWebhooks\Exception\Webhook\FailedSendHookException
     */
    public function send(string $url, GetPayloadInterface $payload, array $options = []): ResponseInterface;
}
