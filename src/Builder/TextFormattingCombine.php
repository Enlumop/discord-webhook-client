<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Builder;

use EnterV\DiscordWebhooks\Builder\Interface\TextFormattingCombineInterface;

class TextFormattingCombine implements TextFormattingCombineInterface
{
    protected bool $bold = false;

    protected bool $italic = false;

    protected bool $underline = false;

    protected bool $strikethrough = false;

    protected bool $listElement = false;

    protected bool $quoteBlock = false;

    protected bool $multilineQuoteBlock = false;

    public function isBold(): bool
    {
        return $this->bold;
    }

    public function isItalic(): bool
    {
        return $this->italic;
    }

    public function isUnderline(): bool
    {
        return $this->underline;
    }

    public function isStrikethrough(): bool
    {
        return $this->strikethrough;
    }

    public function isListElement(): bool
    {
        return $this->listElement;
    }

    public function isQuoteBlock(): bool
    {
        return $this->quoteBlock;
    }

    public function isMultilineQuoteBlock(): bool
    {
        return $this->multilineQuoteBlock;
    }

    public function withBold(): static
    {
        $this->bold = true;

        return $this;
    }

    public function withItalic(): static
    {
        $this->italic = true;

        return $this;
    }

    public function withUnderline(): static
    {
        $this->underline = true;

        return $this;
    }

    public function withStrikethrough(): static
    {
        $this->strikethrough = true;

        return $this;
    }

    public function withListElement(): static
    {
        $this->listElement = true;

        return $this;
    }

    public function withQuoteBlock(): static
    {
        $this->quoteBlock = true;

        return $this;
    }

    public function withMultilineQuoteBlock(): static
    {
        $this->multilineQuoteBlock = true;

        return $this;
    }
}
