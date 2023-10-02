<?php

declare(strict_types=1);

namespace Enlumop\DiscordWebhooks;

use Enlumop\DiscordWebhooks\Helper\ColorHelper;
use Enlumop\DiscordWebhooks\Interface\Color\ColorInterface;

class Color implements ColorInterface
{
    protected string $rgb;

    public function __construct(string $rgb)
    {
        $this->setRgb($rgb);
    }

    public function setRgb(string $rgb): void
    {
        $this->rgb = ColorHelper::convertShortRGBToFull($rgb);
    }

    public function toInt(): int|float
    {
        return hexdec($this->rgb);
    }
}
