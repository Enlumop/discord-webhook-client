<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Builder\Interface;

/**
 * Everything you need to build a formatted message.
 *
 * @see https://github.com/EnterVPL/discord-webhooks/blob/master/docs/TextMessageBuilder.md
 */
interface MessageBuilderInterface extends SetMessageBuilderInterface
{
    /**
     * Returns a formatted string consistent with Discord message formatting.
     */
    public function build(): string;
}
