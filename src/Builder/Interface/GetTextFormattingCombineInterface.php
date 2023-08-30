<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Builder\Interface;

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
