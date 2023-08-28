<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Builder\Interface;

use EnterV\Voi\StringVoInterface;

interface MessageBuilderInterface extends SetMessageBuilderInterface
{
    public function build(): StringVoInterface;
}
