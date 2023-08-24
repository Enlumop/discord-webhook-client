<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Interface\Payload;

interface SetPayloadInterface
{
    public function setUsername(string $username): static;

    public function setAvatarUrl(string $avatarUrl): static;
    public function setMessage(string $message): static;
    public function addEmbed(EmbedInterface $embed): static;
    public function setTts(bool $tts): static;
}
