<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Interface\Color;

interface ColorInterface
{
    public function setRgb(string $rgb): void;

    public function toInt(): int|float;
}
