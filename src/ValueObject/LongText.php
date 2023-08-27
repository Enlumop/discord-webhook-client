<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\ValueObject;

use EnterV\Voi\SacralTypeVoInterface;
use EnterV\Voi\StringVoInterface;

class LongText implements StringVoInterface, SacralTypeVoInterface
{
    public function __construct(
        protected readonly string $value
    ) {
    }

    public function value(): string
    {
        return $this->value;
    }
}
