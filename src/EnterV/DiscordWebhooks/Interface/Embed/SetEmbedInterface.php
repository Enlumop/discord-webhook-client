<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Interface\Embed;

interface SetEmbedInterface
{
    public function setTitle(string $title): static;
    public function setType(string $type = "rich"): static;
    public function setDescription(string $description): static;
    public function setUrl(string $url): static;
    public function setTimestamp(string $timestamp): static;
    public function setColor(int|string $color): static;
    public function setFooter(string $footer, string $iconUrl = ''): static;
    public function setImage(string $url): static;
    public function setThumbnail(string $url): static;
    public function setVideo(string $video): static;
    public function setProvider(string $provider): static;
    public function setAuthor(string $name, string $url, string $iconUrl): static;
    public function setFields(string $fields, bool|int|string|float $value, $inline = false): static;
}
