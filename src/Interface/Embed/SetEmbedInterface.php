<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Interface\Embed;

use EnterV\DiscordWebhooks\Interface\Color\ColorInterface;

/**
 * Interface for public setters for the Embed class.
 *
 * @see https://github.com/EnterVPL/discord-webhooks/blob/master/docs/Embed.md
 */
interface SetEmbedInterface
{
    /**
     * Sets the title of the embedded content.
     */
    public function setTitle(string $title): static;

    /**
     * Sets the url link to the title of the embedded content.
     */
    public function setTitleUrl(string $url): static;

    /**
     * Sets the description of the embedded content.
     */
    public function setDescription(string $description): static;

    /**
     * Sets the time at which the embedded content was created.
     */
    public function setTimestamp(\DateTimeInterface $timestamp): static;

    /**
     * Sets the color of the embedded content bar.
     */
    public function setColor(ColorInterface $color): static;

    /**
     * Sets the footer for embedded content.
     */
    public function setFooter(string $text, null|string $iconUrl = null): static;

    /**
     * Sets the image of the embedded content.
     */
    public function setImage(string $url): static;

    /**
     * Sets the thumbnail visible at the top right of embedded content.
     */
    public function setThumbnail(string $url): static;

    /**
     * Sets the author of the embedded content.
     */
    public function setAuthor(string $name, string $url, string $iconUrl): static;

    /**
     * Adds a field to embedded content.
     * You can add several different fields. They are displayed in the order they were added.
     */
    public function addField(string $name, null|bool|int|float|string $value, bool $inline = false): static;
}
