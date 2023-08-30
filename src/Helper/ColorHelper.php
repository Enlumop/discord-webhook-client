<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Helper;

use EnterV\DiscordWebhooks\Exception\Color\ColorException;

class ColorHelper
{
    public const SHORT_RGB_REGEX = '/^#?([A-Fa-f0-9]{3})$/';
    public const RGB_REGEX = '/^#?([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/';

    public static function validRgb(string $rgb): bool
    {
        if (preg_match(static::RGB_REGEX, $rgb)) {
            return true;
        }

        return false;
    }

    /**
     * @throws ColorException
     */
    public static function convertShortRGBToFull(string $rgb): string
    {
        if (preg_match(static::SHORT_RGB_REGEX, $rgb)) {
            return str_repeat($rgb, 2);
        }
        if (static::validRgb($rgb)) {
            return $rgb;
        }

        throw new ColorException("Invalid RGB Code: {$rgb}");
    }
}
