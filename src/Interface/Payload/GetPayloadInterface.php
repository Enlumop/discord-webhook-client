<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Interface\Payload;

interface GetPayloadInterface
{
    /**
     * @return array<mixed>
     */
    public function toArray(): array;
}
