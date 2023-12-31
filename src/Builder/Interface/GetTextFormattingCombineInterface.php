<?php

declare(strict_types=1);

namespace Enlumop\DiscordWebhooks\Builder\Interface;

/**
 * All public methods that can be used to check whether a given format has been used.
 *
 * @see https://github.com/Enlumop/discord-webhook-client/blob/master/docs/TextFormattingCombine.md
 */
interface GetTextFormattingCombineInterface
{
    public function isBold(): bool;

    public function isItalic(): bool;

    public function isUnderline(): bool;

    public function isStrikethrough(): bool;

    public function isListElement(): bool;

    public function isQuoteBlock(): bool;

    public function isMultilineQuoteBlock(): bool;
}
