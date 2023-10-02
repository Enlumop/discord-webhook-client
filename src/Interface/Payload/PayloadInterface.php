<?php

declare(strict_types=1);

namespace Enlumop\DiscordWebhooks\Interface\Payload;

/**
 * A full-fledged interface for the Payload class.
 *
 * @see https://github.com/Enlumop/discord-webhook-client/blob/master/docs/Payload.md
 */
interface PayloadInterface extends GetPayloadInterface, SetPayloadInterface {}
