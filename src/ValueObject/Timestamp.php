<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\ValueObject;

use EnterV\Voi\DateTimeVoInterface;
use EnterV\Voi\FormattedDateTimeVoInterface;

class Timestamp implements DateTimeVoInterface, FormattedDateTimeVoInterface
{
    public function __construct(
        protected readonly \DateTimeInterface $value,
    ) {
    }

    public function value(): \DateTimeInterface
    {
        return $this->value;
    }

    public function formatted(): string
    {
        return $this->value->format('c');
    }
}
