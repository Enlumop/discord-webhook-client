<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Interface\Payload;

use EnterV\DiscordWebhooks\Interface\Embed\GetEmbedInterface;
use EnterV\Voi\BoolVoInterface;
use EnterV\Voi\StringVoInterface;

interface SetPayloadInterface
{
    public function setUsername(StringVoInterface $username): static;
    public function setAvatarUrl(StringVoInterface $avatarUrl): static;
    public function setMessage(StringVoInterface $message): static;
    public function setEmbed(GetEmbedInterface $embed): static;
    public function setTts(BoolVoInterface $tts): static;
}
