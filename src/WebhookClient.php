<?php

namespace EnterV\DiscordWebhooks;

use EnterV\DiscordWebhooks\Interface\Payload\GetPayloadInterface;
use EnterV\DiscordWebhooks\Interface\WebhookClient\WebhookClientInterface;
use EnterV\Voi\StringVoInterface;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;

/**
 * Client generates the payload and sends the webhook payload to Discord
 */
class WebhookClient implements WebhookClientInterface
{
    /**
     * @param StringVoInterface $url
     * @param GetPayloadInterface $payload
     * @param array $options Request options to apply to the given
     *                       request and to the transfer. See \GuzzleHttp\RequestOptions.
     * @return ResponseInterface
     */
    public function send(StringVoInterface $url, GetPayloadInterface $payload, array $options = []): ResponseInterface
    {
        $payloadJson = json_encode($payload->toArray());

        $request = new Request(
            "POST",
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

        if ($code != 204) {
            throw new \Exception($code . ':' . $content);
        }

        return $response;
    }
}
