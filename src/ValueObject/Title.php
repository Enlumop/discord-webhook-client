<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\ValueObject;

use EnterV\Voi\StringVoInterface;

class Title implements StringVoInterface
{
    public function __construct(
        protected readonly string $value,
    ) {
    }

    public function value(): string
    {
        return $this->value;
    }
}
