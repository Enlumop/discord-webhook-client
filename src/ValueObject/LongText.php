<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\ValueObject;

use EnterV\Voi\StringVoInterface;
use EnterV\Voi\Traits\StringVoConcatTrait;

class LongText implements StringVoInterface
{
    use StringVoConcatTrait;

    public function __construct(
        protected readonly string $value
    ) {
    }

    public function value(): string
    {
        return $this->value;
    }
}
