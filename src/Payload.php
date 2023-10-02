<?php

declare(strict_types=1);

namespace Enlumop\DiscordWebhooks;

use Enlumop\DiscordWebhooks\Interface\Embed\GetEmbedInterface;
use Enlumop\DiscordWebhooks\Interface\Payload\PayloadInterface;

class Payload implements PayloadInterface
{
    protected ?string $username = null;
    protected ?string $avatarUrl = null;
    protected ?string $message = null;

    /**
     * @var null|array<array<mixed>>
     */
    protected ?array $embeds = null;
    protected bool $tts = false;

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function setAvatarUrl(string $avatarUrl): static
    {
        $this->avatarUrl = $avatarUrl;

        return $this;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function addEmbed(GetEmbedInterface $embed): static
    {
        if (null === $this->embeds) {
            $this->embeds = [];
        }
        $this->embeds[] = $embed->toArray();

        return $this;
    }

    public function setTts(bool $tts): static
    {
        $this->tts = $tts;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'username' => $this->username,
            'avatar_url' => $this->avatarUrl,
            'content' => $this->message,
            'embeds' => $this->embeds,
            'tts' => $this->tts,
        ];
    }
}
