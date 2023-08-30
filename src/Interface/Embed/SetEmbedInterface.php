<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Interface\Embed;

use EnterV\DiscordWebhooks\Interface\Color\ColorInterface;

interface SetEmbedInterface
{
    public function setTitle(string $title): static;

    public function setTitleUrl(string $url): static;

    public function setDescription(string $description): static;

    public function setTimestamp(\DateTimeInterface $timestamp): static;

    public function setColor(ColorInterface $color): static;

    public function setFooter(string $text, null|string $iconUrl = null): static;

    public function setImage(string $url): static;

    public function setThumbnail(string $url): static;

    public function setAuthor(string $name, string $url, string $iconUrl): static;

    public function addField(string $name, null|bool|int|float|string $value, bool $inline = false): static;
}
