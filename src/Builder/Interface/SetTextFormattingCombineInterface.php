<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Builder\Interface;

interface SetTextFormattingCombineInterface
{
    public function withBold(): static;

    public function withItalic(): static;

    public function withUnderline(): static;

    public function withStrikethrough(): static;

    public function withListElement(): static;

    public function withQuoteBlock(): static;

    public function withMultilineQuoteBlock(): static;
}
