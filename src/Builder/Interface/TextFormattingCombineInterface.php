<?php

declare(strict_types=1);

namespace Enlumop\DiscordWebhooks\Builder\Interface;

/**
 * Everything you need to be able to create text with a combination of formats.
 *
 * @see https://github.com/Enlumop/discord-webhook-client/blob/master/docs/TextFormattingCombine.md
 */
interface TextFormattingCombineInterface extends SetTextFormattingCombineInterface, GetTextFormattingCombineInterface {}
