<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\ValueObject;

use EnterV\Voi\StringVoInterface;

class ShortText implements StringVoInterface
{
    public function __construct(
        protected readonly string $value
    ) {
        if (255 <= \strlen($value)) {
            throw new \Exception('Text is too long. Max 255 characters');
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}
