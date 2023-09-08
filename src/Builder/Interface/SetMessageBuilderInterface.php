<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Builder\Interface;

/**
 * All methods that add text, following Discord's formatting.
 *
 * @see https://github.com/EnterVPL/discord-webhooks/blob/master/docs/TextMessageBuilder.md
 */
interface SetMessageBuilderInterface
{
    /**
     * Adds text to the message, without formatting.
     */
    public function addText(string $text): static;

    /**
     * Adds a new line.
     */
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
