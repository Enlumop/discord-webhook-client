<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Builder\Interface;

use EnterV\Voi\BoolVoInterface;

interface GetTextFormattingCombineInterface
{
    public function isBold(): BoolVoInterface;

    public function isItalic(): BoolVoInterface;

    public function isUnderline(): BoolVoInterface;

    public function isStrikethrough(): BoolVoInterface;

    public function isListElement(): BoolVoInterface;

    public function isQuoteBlock(): BoolVoInterface;

    public function isMultilineQuoteBlock(): BoolVoInterface;
}
