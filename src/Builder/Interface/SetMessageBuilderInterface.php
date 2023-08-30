<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Builder\Interface;

interface SetMessageBuilderInterface
{
    public function addText(string $text): static;

    public function addNewLine(): static;

    /**
     *  \*\*text\*\*.
     */
    public function addBold(string $text): static;

    /**
     *  \*text\*.
     */
    public function addItalic(string $text): static;

    /**
     *  \_\_text\_\_.
     */
    public function addUnderline(string $text): static;

    /**
     *  \~\~text\~\~.
     */
    public function addStrikethrough(string $text): static;

    /**
     *  - text.
     */
    public function addList(string $text, int $indentation = 0): static;

    /**
     * `text`.
     */
    public function addCodeBlock(string $text): static;

    /**
     * \`\`\`lang
     * text
     * \`\`\`.
     */
    public function addMultilineCodeBlock(string $text, null|string $lang = null): static;

    /**
     * \> text.
     */
    public function addQuoteBlock(string $text): static;

    /**
     * \>\>\> text.
     */
    public function addMultilineQuoteBlock(string $text): static;

    /**
     * Example:
     * |- \*\*text\*\*.
     */
    public function addCombineTextFormatting(string $text, GetTextFormattingCombineInterface $combine): static;
}
