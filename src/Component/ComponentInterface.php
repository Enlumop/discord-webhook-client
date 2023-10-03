<?php

declare(strict_types=1);

namespace Enlumop\DiscordWebhooks\Component;

interface ComponentInterface
{
    public function getType(): ComponentType;

    /**
     * @return array<mixed>
     */
    public function getComponents(): array;
}
