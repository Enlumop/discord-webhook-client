<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Builder\Interface;

/**
 * Everything you need to be able to create text with a combination of formats.
 *
 * @see https://github.com/EnterVPL/discord-webhooks/blob/master/docs/TextFormattingCombine.md
 */
interface TextFormattingCombineInterface extends SetTextFormattingCombineInterface, GetTextFormattingCombineInterface
{
}
