<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Builder\Interface;

use EnterV\Voi\IntegerVoInterface;
use EnterV\Voi\StringVoInterface;

interface SetMessageBuilderInterface
{
    public function addText(string|StringVoInterface $text): static;

    public function addNewLine(): static;

    /**
     *  \*\*text\*\*.
     */
    public function addBold(string|StringVoInterface $text): static;

    /**
     *  \*text\*.
     */
    public function addItalic(string|StringVoInterface $text): static;

    /**
     *  \_\_text\_\_.
     */
    public function addUnderline(string|StringVoInterface $text): static;

    /**
     *  \~\~text\~\~.
     */
    public function addStrikethrough(string|StringVoInterface $text): static;

    /**
     *  - text.
     */
    public function addList(string|StringVoInterface $text, int|IntegerVoInterface $indentation = 0): static;

    /**
     * `text`.
     */
    public function addCodeBlock(string|StringVoInterface $text): static;

    /**
     * \`\`\`lang
     * text
     * \`\`\`.
     */
    public function addMultilineCodeBlock(string|StringVoInterface $text, null|string|StringVoInterface $lang = null): static;

    /**
     * \> text.
     */
    public function addQuoteBlock(string|StringVoInterface $text): static;

    /**
     * \>\>\> text.
     */
    public function addMultilineQuoteBlock(string|StringVoInterface $text): static;

    /**
     * Example:
     * |- \*\*text\*\*.
     */
    public function addCombineTextFormatting(string|StringVoInterface $text, GetTextFormattingCombineInterface $combine): static;
}
