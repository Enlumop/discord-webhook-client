<?php

namespace EnterV\DiscordWebhooks;

use GuzzleHttp\Psr7\Request;

/**
 * Client generates the payload and sends the webhook payload to Discord
 */
class Client
{
    protected string $url;
    protected ?string $username = null;
    protected ?string $avatar = null;
    protected string $message;
    protected array $embeds;
    protected int $tts = 0;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function tts($tts = 0)
    {
        $this->tts = $tts;
        return $this;
    }
    public function username($username)
    {
        $this->username = $username;
        return $this;
    }

    public function avatar($new_avatar)
    {
        $this->avatar = $new_avatar;
        return $this;
    }

    public function message($new_message)
    {
        $this->message = $new_message;
        return $this;
    }

    public function embed(Embed $embed)
    {
        $this->embeds[] = $embed->toArray();
        return $this;
    }

    public function send()
    {
        $payload = json_encode(array(
          'username' => $this->username,
          'avatar_url' => $this->avatar,
          'content' => $this->message,
          'embeds' => $this->embeds,
          'tts' => $this->tts,
        ));

        $request = new Request(
            "POST",
            $this->url,
            [
                'Content-Type' => 'application/json',
            ],
            $payload
        );


        $client = new \GuzzleHttp\Client();
        $response = $client->send($request, [
            'verify' => false
        ]);
        $code = $response->getStatusCode();
        $content = $response->getBody()->getContents();

        if ($code != 204) {
            throw new \Exception($code . ':' . $content);
        }

        return $this;
    }
}
