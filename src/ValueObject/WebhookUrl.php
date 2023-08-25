<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\ValueObject;

class WebhookUrl implements \EnterV\Voi\StringVoInterface
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
