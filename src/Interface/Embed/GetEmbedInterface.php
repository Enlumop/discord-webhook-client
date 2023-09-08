<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Interface\Embed;

/**
 * Data that Embed should return.
 *
 * @see https://github.com/EnterVPL/discord-webhooks/blob/master/docs/Embed.md
 */
interface GetEmbedInterface
{
    /**
     * Convert all embed properties to array foramt.
     *
     * @return array<string, null|array<mixed>|float|int|string>
     */
    public function toArray(): array;
}
