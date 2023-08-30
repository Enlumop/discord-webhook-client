<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Builder;

use EnterV\DiscordWebhooks\Builder\Interface\GetTextFormattingCombineInterface;
use EnterV\DiscordWebhooks\Builder\Interface\MessageBuilderInterface;

class TextMessageBuilder implements MessageBuilderInterface
{
    protected string $message = '';

    /**
     * @var array<string, string>
     */
    protected array $formatMethods = [
        'isBold' => '_addBold',
        'isItalic' => '_addItalic',
        'isUnderline' => '_addUnderline',
        'isStrikethrough' => '_addStrikethrough',
        'isListElement' => '_addList',
        'isQuoteBlock' => '_addQuoteBlock',
        'isMultilineQuoteBlock' => '_addMultilineCodeBlock',
    ];

    public function __construct(
        protected bool $autoNewLine = true
    ) {
    }

    public function build(): string
    {
        return $this->message;
    }

    public function addText(string $text): static
    {
        $this->concatMessage($text);

        return $this;
    }

    public function addNewLine(): static
    {
        if ($this->autoNewLine) {
            $this->addText('');

            return $this;
        }
        $this->concatMessage("\n");

        return $this;
    }

    public function addBold(string $text): static
    {
        $this->concatMessage($this->_addBold($text));

        return $this;
    }

    public function addItalic(string $text): static
    {
        $this->concatMessage($this->_addItalic($text));

        return $this;
    }

    public function addUnderline(string $text): static
    {
        $this->concatMessage($this->_addUnderline($text));

        return $this;
    }

    public function addStrikethrough(string $text): static
    {
        $this->concatMessage($this->_addStrikethrough($text));

        return $this;
    }

    public function addList(string $text, int $indentation = 0): static
    {
        $this->concatMessage($this->_addList($text, $indentation));

        return $this;
    }

    public function _addList(string $text, int $indentation = 0): string
    {
        $indentationFormat = str_repeat('  ', $indentation);

        return $this->addFormat($text, $indentationFormat.'- ');
    }

    public function addCodeBlock(string $text): static
    {
        $this->concatMessage($this->_addCodeBlock($text));

        return $this;
    }

    public function _addCodeBlock(string $text): string
    {
        return $this->addDoubleFormat($text, '`');
    }

    public function addMultilineCodeBlock(string $text, null|string $lang = null): static
    {
        $this->concatMessage($this->_addMultilineCodeBlock($text, $lang));

        return $this;
    }

    public function _addMultilineCodeBlock(string $text, null|string $lang = null): string
    {
        return <<<CODEBLOCK
```{$lang}
{$text}
```
CODEBLOCK;
    }

    public function addQuoteBlock(string $text): static
    {
        $this->concatMessage($this->_addQuoteBlock($text));

        return $this;
    }

    public function _addQuoteBlock(string $text): string
    {
        return $this->addFormat($text, '> ');
    }

    public function addMultilineQuoteBlock(string $text): static
    {
        $this->concatMessage($this->_addMultilineQuoteBlock($text));

        return $this;
    }

    public function _addMultilineQuoteBlock(string $text): string
    {
        return $this->addFormat($text, '>>> ');
    }

    public function addCombineTextFormatting(string $text, GetTextFormattingCombineInterface $combine): static
    {
        foreach ($this->formatMethods as $checkMethod => $formatMethod) {
            if ($combine->{$checkMethod}()) {
                $text = $this->{$formatMethod}($text);
            }
        }

        $this->concatMessage($text);

        return $this;
    }

    protected function _addBold(string $text): string
    {
        return $this->addDoubleFormat($text, '**');
    }

    protected function _addItalic(string $text): string
    {
        return $this->addDoubleFormat($text, '*');
    }

    protected function _addUnderline(string $text): string
    {
        return $this->addDoubleFormat($text, '__');
    }

    protected function _addStrikethrough(string $text): string
    {
        return $this->addDoubleFormat($text, '~~');
    }

    protected function concatMessage(string $text): void
    {
        $this->message .= $text;
        if ($this->autoNewLine) {
            $this->message .= "\n";
        }
    }

    protected function addFormat(string $text, string $format): string
    {
        return $format.$text;
    }

    protected function addDoubleFormat(string $text, string $format): string
    {
        return $this->addFormat($text, $format).$format;
    }
}
