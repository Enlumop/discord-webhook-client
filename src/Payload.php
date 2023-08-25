<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks;

use EnterV\DiscordWebhooks\Interface\Embed\GetEmbedInterface;
use EnterV\DiscordWebhooks\Interface\Payload\PayloadInterface;
use EnterV\Voi\BoolVoInterface;
use EnterV\Voi\StringVoInterface;

class Payload implements PayloadInterface
{
    protected ?StringVoInterface $username = null;
    protected ?StringVoInterface $avatarUrl = null;
    protected ?StringVoInterface $message = null;
    protected ?GetEmbedInterface $embed = null;
    protected ?BoolVoInterface $tts = null;

    public function setUsername(StringVoInterface $username): static
    {
        $this->username = $username;
        return $this;
    }
    public function setAvatarUrl(StringVoInterface $avatarUrl): static
    {
        $this->avatarUrl = $avatarUrl;
        return $this;
    }
    public function setMessage(StringVoInterface $message): static
    {
        $this->message = $message;
        return $this;
    }
    public function setEmbed(GetEmbedInterface $embed): static
    {
        $this->embed = $embed;
        return $this;
    }
    public function setTts(BoolVoInterface $tts): static
    {
        $this->tts = $tts;
        return $this;
    }

    public function toArray(): array
    {
        return[
            'username' => $this->username?->value(),
            'avatar_url' => $this->avatarUrl?->value(),
            'content' => $this->message?->value(),
            'embeds' => [$this->embed?->toArray()],
            'tts' => $this->tts?->value() ?? false,
        ];
    }
}
