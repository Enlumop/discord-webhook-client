<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\ValueObject;

use EnterV\Voi\ColorDecodedVoInterface;
use EnterV\Voi\ColorVoInterface;

class Color implements ColorVoInterface, ColorDecodedVoInterface
{
    public function __construct(
        protected readonly int|float|string $value,
    ) {
    }

    public function value(): int|float|string
    {
        return $this->value;
    }

    public function decoded(): int|float
    {
        $value = $this->value();
        $isNumber = \is_int($value) || \is_float($value);

        return $isNumber ? $value : hexdec($value);
    }
}
