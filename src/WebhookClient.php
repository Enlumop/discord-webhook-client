<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks;

use EnterV\DiscordWebhooks\Interface\Payload\GetPayloadInterface;
use EnterV\DiscordWebhooks\Interface\WebhookClient\WebhookClientInterface;
use EnterV\Voi\StringVoInterface;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;

class WebhookClient implements WebhookClientInterface
{
    /**
     * @param array<string, mixed> $options Request options to apply to the given
     *                                      request and to the transfer. See \GuzzleHttp\RequestOptions.
     */
    public function send(StringVoInterface $url, GetPayloadInterface $payload, array $options = []): ResponseInterface
    {
        $payloadJson = json_encode($payload->toArray());

        if (!$payloadJson) {
            throw new \Exception('Unacepted Payload');
        }

        $request = new Request(
            'POST',
            $url->value(),
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
            throw new \Exception($code.':'.$content);
        }

        return $response;
    }
}
