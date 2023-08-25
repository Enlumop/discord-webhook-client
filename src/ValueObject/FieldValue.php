<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\ValueObject;

use EnterV\Voi\SacralTypeVoInterface;

class FieldValue implements SacralTypeVoInterface
{
    public function __construct(
        protected readonly bool|int|float|string $value,
    ) {
    }

    public function value(): bool|int|float|string
    {
        return $this->value;
    }
}
