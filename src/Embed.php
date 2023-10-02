<?php

declare(strict_types=1);

namespace Enlumop\DiscordWebhooks;

use Enlumop\DiscordWebhooks\Interface\Color\ColorInterface;
use Enlumop\DiscordWebhooks\Interface\Embed\EmbedInterface;

class Embed implements EmbedInterface
{
    protected ?string $title = null;
    protected ?string $titleUrl = null;
    protected ?string $description = null;
    protected ?\DateTimeInterface $timestamp = null;
    protected ?ColorInterface $color = null;

    /**
     * @var array<string, null|string>
     */
    protected array $footer = [];

    /**
     * @var array<string, null|string>
     */
    protected array $image = [];

    /**
     * @var array<string, null|string>
     */
    protected array $thumbnail = [];

    /**
     * @var array<string, null|string>
     */
    protected array $author = [];

    /**
     * @var array<mixed>
     */
    protected array $fields = [];

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function setTitleUrl(string $url): static
    {
        $this->titleUrl = $url;

        return $this;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function setTimestamp(\DateTimeInterface $timestamp): static
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    public function setColor(ColorInterface $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function setFooter(string $text, null|string $iconUrl = null): static
    {
        $this->footer = [
            'text' => $text,
            'icon_url' => $iconUrl,
        ];

        return $this;
    }

    public function setImage(string $url): static
    {
        $this->image = [
            'url' => $url,
        ];

        return $this;
    }

    public function setThumbnail(string $url): static
    {
        $this->thumbnail = [
            'url' => $url,
        ];

        return $this;
    }

    public function setAuthor(string $name, string $url, string $iconUrl): static
    {
        $this->author = [
            'name' => $name,
            'url' => $url,
            'icon_url' => $iconUrl,
        ];

        return $this;
    }

    public function addField(string $name, null|bool|int|float|string $value, bool $inline = false): static
    {
        $this->fields[] = [
            'name' => $name,
            'value' => $value,
            'inline' => $inline,
        ];

        return $this;
    }

    /**
     * @return array<string, null|array<mixed>|float|int|string>
     */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'type' => 'rich',
            'description' => $this->description,
            'url' => $this->titleUrl,
            'color' => $this->color?->toInt(),
            'footer' => $this->footer,
            'image' => $this->image,
            'thumbnail' => $this->thumbnail,
            'timestamp' => $this->timestamp?->format(\DateTimeInterface::ATOM),
            'author' => $this->author,
            'fields' => $this->fields,
        ];
    }
}
