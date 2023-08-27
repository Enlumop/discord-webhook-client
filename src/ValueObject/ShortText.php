<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\ValueObject;

use EnterV\DiscordWebhooks\Exception\Vo\TooLongTextException;
use EnterV\Voi\StringVoInterface;

class ShortText implements StringVoInterface
{
    public function __construct(
        protected readonly string $value
    ) {
        $maxLen = 255;
        if ($maxLen <= \strlen($value)) {
            throw new TooLongTextException("Max {$maxLen} characters");
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}
