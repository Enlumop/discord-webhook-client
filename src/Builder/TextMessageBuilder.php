<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Builder;

use EnterV\DiscordWebhooks\Builder\Interface\GetTextFormattingCombineInterface;
use EnterV\DiscordWebhooks\Builder\Interface\MessageBuilderInterface;
use EnterV\DiscordWebhooks\ValueObject\LongText;
use EnterV\DiscordWebhooks\ValueObject\ShortText;
use EnterV\Voi\Helper\BoolVoHelper;
use EnterV\Voi\Helper\IntegerVoHelper;
use EnterV\Voi\Helper\StringVoHelper;
use EnterV\Voi\IntegerVoInterface;
use EnterV\Voi\StringVoInterface;

class TextMessageBuilder implements MessageBuilderInterface
{
    protected StringVoInterface $message;

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
        protected bool $autoNewLine = true,
        bool $isShortText = false
    ) {
        $this->message = $this->determinateText($isShortText);
    }

    public function build(): StringVoInterface
    {
        return $this->message;
    }

    public function addText(string|StringVoInterface $text): static
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

    public function addBold(string|StringVoInterface $text): static
    {
        $this->concatMessage($this->_addBold($text));

        return $this;
    }

    public function addItalic(string|StringVoInterface $text): static
    {
        $this->concatMessage($this->_addItalic($text));

        return $this;
    }

    public function addUnderline(string|StringVoInterface $text): static
    {
        $this->concatMessage($this->_addUnderline($text));

        return $this;
    }

    public function addStrikethrough(string|StringVoInterface $text): static
    {
        $this->concatMessage($this->_addStrikethrough($text));

        return $this;
    }

    public function addList(string|StringVoInterface $text, int|IntegerVoInterface $indentation = 0): static
    {
        $this->concatMessage($this->_addList($text, $indentation));

        return $this;
    }

    public function _addList(string|StringVoInterface $text, int|IntegerVoInterface $indentation = 0): string
    {
        $indentation = IntegerVoHelper::getNumber($indentation);
        $indentationFormat = str_repeat('  ', $indentation);

        return $this->addFormat($text, $indentationFormat.'- ');
    }

    public function addCodeBlock(string|StringVoInterface $text): static
    {
        $this->concatMessage($this->_addCodeBlock($text));

        return $this;
    }

    public function _addCodeBlock(string|StringVoInterface $text): string
    {
        return $this->addDoubleFormat($text, '`');
    }

    public function addMultilineCodeBlock(string|StringVoInterface $text, null|string|StringVoInterface $lang = null): static
    {
        $this->concatMessage($this->_addMultilineCodeBlock($text, $lang));

        return $this;
    }

    public function _addMultilineCodeBlock(string|StringVoInterface $text, null|string|StringVoInterface $lang = null): string
    {
        $text = StringVoHelper::getString($text);
        if (null !== $lang) {
            $lang = StringVoHelper::getString($lang);
        }

        return <<<CODEBLOCK
```{$lang}
{$text}
```
CODEBLOCK;
    }

    public function addQuoteBlock(string|StringVoInterface $text): static
    {
        $this->concatMessage($this->_addQuoteBlock($text));

        return $this;
    }

    public function _addQuoteBlock(string|StringVoInterface $text): string
    {
        return $this->addFormat($text, '> ');
    }

    public function addMultilineQuoteBlock(string|StringVoInterface $text): static
    {
        $this->concatMessage($this->_addMultilineQuoteBlock($text));

        return $this;
    }

    public function _addMultilineQuoteBlock(string|StringVoInterface $text): string
    {
        return $this->addFormat($text, '>>> ');
    }

    public function addCombineTextFormatting(string|StringVoInterface $text, GetTextFormattingCombineInterface $combine): static
    {
        $text = StringVoHelper::getString($text);
        foreach ($this->formatMethods as $checkMethod => $formatMethod) {
            if (BoolVoHelper::getBool($combine->{$checkMethod}())) {
                $text = $this->{$formatMethod}($text);
            }
        }

        $this->concatMessage($text);

        return $this;
    }

    protected function _addBold(string|StringVoInterface $text): string
    {
        return $this->addDoubleFormat($text, '**');
    }

    protected function _addItalic(string|StringVoInterface $text): string
    {
        return $this->addDoubleFormat($text, '*');
    }

    protected function _addUnderline(string|StringVoInterface $text): string
    {
        return $this->addDoubleFormat($text, '__');
    }

    protected function _addStrikethrough(string|StringVoInterface $text): string
    {
        return $this->addDoubleFormat($text, '~~');
    }

    protected function concatMessage(string|StringVoInterface $text): void
    {
        $this->message = $this->message->concat($text);
        if ($this->autoNewLine) {
            $this->message = $this->message->concat("\n");
        }
    }

    protected function addFormat(string|StringVoInterface $text, string $format): string
    {
        $text = StringVoHelper::getString($text);

        return $format.$text;
    }

    protected function addDoubleFormat(string|StringVoInterface $text, string $format): string
    {
        return $this->addFormat($text, $format).$format;
    }

    protected function determinateText(bool $isShortText): StringVoInterface
    {
        if (!$isShortText) {
            return new LongText('');
        }

        return $this->message = new ShortText('');
    }
}
