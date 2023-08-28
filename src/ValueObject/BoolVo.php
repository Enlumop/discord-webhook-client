<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\ValueObject;

use EnterV\Voi\BoolVoInterface;
use EnterV\Voi\Traits\BoolVoOperationsTrait;

class BoolVo implements BoolVoInterface
{
    use BoolVoOperationsTrait;

    public function __construct(
        protected readonly bool $value,
    ) {
    }

    public function value(): bool
    {
        return $this->value;
    }
}
