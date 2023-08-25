<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Interface\Embed;

interface GetEmbedInterface
{
    /**
     * @return array<string, null|string|int|float|array<mixed>>
     */
    public function toArray(): array;
}
