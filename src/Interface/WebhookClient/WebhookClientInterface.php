<?php

declare(strict_types=1);

namespace Enlumop\DiscordWebhooks\Interface\WebhookClient;

use Enlumop\DiscordWebhooks\Interface\Payload\GetPayloadInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * A full-fledged interface for the WebhookClient class.
 *
 * @see https://github.com/Enlumop/discord-webhook-client/blob/master/docs/WebhookClient.md
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
     * @throws \Enlumop\DiscordWebhooks\Exception\Webhook\FailedSendHookException
     */
    public function send(string $url, GetPayloadInterface $payload, array $options = []): ResponseInterface;
}
