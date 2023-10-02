<?php

declare(strict_types=1);

namespace Enlumop\DiscordWebhooks\Builder\Interface;

/**
 * All public methods that can be used to set a format combination. Use only those that are needed.
 *
 * @see https://github.com/Enlumop/discord-webhook-client/blob/master/docs/TextFormattingCombine.md
 */
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
