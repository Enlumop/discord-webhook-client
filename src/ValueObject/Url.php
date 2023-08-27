<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\ValueObject;

use EnterV\Voi\StringVoInterface;

class Url implements StringVoInterface
{
    public function __construct(
        protected readonly string $value
    ) {
        if (!filter_var($value, FILTER_VALIDATE_URL)) {
            throw new \Exception('Valid URL');
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}
