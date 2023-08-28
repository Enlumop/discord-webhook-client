<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\ValueObject;

use EnterV\DiscordWebhooks\Exception\Vo\InvalidUrlException;
use EnterV\Voi\StringVoInterface;
use EnterV\Voi\Traits\StringVoConcatTrait;

class Url implements StringVoInterface
{
    use StringVoConcatTrait;

    public function __construct(
        protected readonly string $value
    ) {
        if (!filter_var($value, FILTER_VALIDATE_URL)) {
            throw new InvalidUrlException();
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}
