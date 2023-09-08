<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Interface\Payload;

/**
 * Data that Payload should return.
 *
 * @see https://github.com/EnterVPL/discord-webhooks/blob/master/docs/Payload.md
 */
interface GetPayloadInterface
{
    /**
     * Convert all properties to array foramt.
     *
     * @return array<mixed>
     */
    public function toArray(): array;
}
