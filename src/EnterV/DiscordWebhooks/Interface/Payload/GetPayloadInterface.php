<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Interface\Payload;

interface GetPayloadInterface
{
    public function getUsername(): string;

    public function getAvatarUrl(): string;
    public function getMessage(): string;
    /**
     * @return array<EmbedInterface>
     */
    public function getEmbed(): array;
    public function withTts(): bool;
}
