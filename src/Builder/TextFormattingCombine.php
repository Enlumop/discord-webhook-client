<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Builder;

use EnterV\DiscordWebhooks\Builder\Interface\TextFormattingCombineInterface;
use EnterV\DiscordWebhooks\ValueObject\BoolVo;
use EnterV\Voi\BoolVoInterface;

class TextFormattingCombine implements TextFormattingCombineInterface
{
    protected bool $bold = false;

    protected bool $italic = false;

    protected bool $underline = false;

    protected bool $strikethrough = false;

    protected bool $listElement = false;

    protected bool $quoteBlock = false;

    protected bool $multilineQuoteBlock = false;

    public function isBold(): BoolVoInterface
    {
        return new BoolVo($this->bold);
    }

    public function isItalic(): BoolVoInterface
    {
        return new BoolVo($this->italic);
    }

    public function isUnderline(): BoolVoInterface
    {
        return new BoolVo($this->underline);
    }

    public function isStrikethrough(): BoolVoInterface
    {
        return new BoolVo($this->strikethrough);
    }

    public function isListElement(): BoolVoInterface
    {
        return new BoolVo($this->listElement);
    }

    public function isQuoteBlock(): BoolVoInterface
    {
        return new BoolVo($this->quoteBlock);
    }

    public function isMultilineQuoteBlock(): BoolVoInterface
    {
        return new BoolVo($this->multilineQuoteBlock);
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
