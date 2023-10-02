<?php

declare(strict_types=1);

namespace Enlumop\DiscordWebhooks\Interface\Payload;

use Enlumop\DiscordWebhooks\Interface\Embed\GetEmbedInterface;

/**
 * Interface for public setters for the Payload class.
 *
 * @see https://github.com/Enlumop/discord-webhook-client/blob/master/docs/Payload.md
 */
interface SetPayloadInterface
{
    /**
     * Sets webhook bot name.
     */
    public function setUsername(string $username): static;

    /**
     * Sets webhook bot avatar.
     * The image format must be compatible with the API.
     * I prefer that the avatar weighs a maximum of 25 kB (just to make it load quickly).
     *
     * See compatible formats: https://discord.com/developers/docs/reference#image-formatting
     */
    public function setAvatarUrl(string $avatarUrl): static;

    /**
     * The message that is displayed before embed.
     */
    public function setMessage(string $message): static;

    /**
     * Adds embedded content.
     */
    public function addEmbed(GetEmbedInterface $embed): static;

    /**
     * Sets text-to-speech (off by default).
     */
    public function setTts(bool $tts): static;
}
