<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\ValueObject;

use EnterV\Voi\BoolVoInterface;

class FieldInlne implements BoolVoInterface
{
    public function __construct(
        protected readonly bool $value,
    ) {
    }

    public function value(): bool
    {
        return $this->value;
    }
}
