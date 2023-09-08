<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Interface\Payload;

/**
 * A full-fledged interface for the Payload class.
 *
 * @see https://github.com/EnterVPL/discord-webhooks/blob/master/docs/Payload.md
 */
interface PayloadInterface extends GetPayloadInterface, SetPayloadInterface
{
}
