<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Interface\Color;

/**
 * @see https://github.com/EnterVPL/discord-webhooks/blob/master/docs/Color.md
 */
interface ColorInterface
{
    /**
     * Set the color with using RGB HEX format (eg. FAFAFA or short code FDA).
     */
    public function setRgb(string $rgb): void;

    /**
     * Convert the color to decimal format.
     */
    public function toInt(): int|float;
}
