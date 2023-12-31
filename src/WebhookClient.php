<?php

declare(strict_types=1);

namespace Enlumop\DiscordWebhooks;

use Enlumop\DiscordWebhooks\Exception\Webhook\FailedSendHookException;
use Enlumop\DiscordWebhooks\Exception\Webhook\InvalidPayloadException;
use Enlumop\DiscordWebhooks\Interface\Payload\GetPayloadInterface;
use Enlumop\DiscordWebhooks\Interface\WebhookClient\WebhookClientInterface;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;

class WebhookClient implements WebhookClientInterface
{
    public function send(string $url, GetPayloadInterface $payload, array $options = []): ResponseInterface
    {
        $payloadJson = json_encode($payload->toArray());

        if (!$payloadJson) {
            throw new InvalidPayloadException();
        }

        $request = new Request(
            'POST',
            $url,
            [
                'Content-Type' => 'application/json',
            ],
            $payloadJson
        );

        $client = new \GuzzleHttp\Client();
        $response = $client->send($request, $options);
        $code = $response->getStatusCode();
        $content = $response->getBody()->getContents();

        if (204 !== $code) {
            throw new FailedSendHookException($code.':'.$content);
        }

        return $response;
    }
}
