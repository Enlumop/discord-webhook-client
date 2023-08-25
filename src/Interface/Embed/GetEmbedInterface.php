<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Interface\Embed;

interface GetEmbedInterface
{
    /**
     * @return array<string, null|array<mixed>|float|int|string>
     */
    public function toArray(): array;
}
