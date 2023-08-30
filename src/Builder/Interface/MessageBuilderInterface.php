<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Builder\Interface;

interface MessageBuilderInterface extends SetMessageBuilderInterface
{
    public function build(): string;
}
