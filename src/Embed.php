<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks;

use EnterV\DiscordWebhooks\Interface\Embed\EmbedInterface;
use EnterV\Voi\BoolVoInterface;
use EnterV\Voi\ColorDecodedVoInterface;
use EnterV\Voi\FormattedDateTimeVoInterface;
use EnterV\Voi\SacralTypeVoInterface;
use EnterV\Voi\StringVoInterface;

class Embed implements EmbedInterface
{
    protected ?StringVoInterface $title = null;
    protected ?StringVoInterface $titleUrl = null;
    protected ?StringVoInterface $description = null;
    protected ?FormattedDateTimeVoInterface $timestamp = null;
    protected ?ColorDecodedVoInterface $color = null;
    /**
     * @var array<string, string|null>
     */
    protected array $footer = [];
    /**
     * @var array<string, string|null>
     */
    protected array $image = [];
    /**
     * @var array<string, string|null>
     */
    protected array $thumbnail = [];
    /**
     * @var array<string, string|null>
     */
    protected array $author = [];
    /**
     * @var array<mixed>
     */
    protected array $fields = [];

    public function setTitle(StringVoInterface $title): static
    {
        $this->title = $title;
        return $this;
    }
    public function setTitleUrl(StringVoInterface $url): static
    {
        $this->titleUrl = $url;
        return $this;
    }
    public function setDescription(StringVoInterface $description): static
    {
        $this->description = $description;
        return $this;
    }
    public function setTimestamp(FormattedDateTimeVoInterface $timestamp): static
    {
        $this->timestamp = $timestamp;
        return $this;
    }
    public function setColor(ColorDecodedVoInterface $color): static
    {
        $this->color = $color;
        return $this;
    }
    public function setFooter(StringVoInterface $text, null|StringVoInterface $iconUrl = null): static
    {
        $this->footer = [
          'text' => $text->value(),
          'icon_url' => $iconUrl?->value(),
        ];
        return $this;
    }
    public function setImage(StringVoInterface $url): static
    {
        $this->image = [
          'url' => $url->value(),
        ];
        return $this;
    }
    public function setThumbnail(StringVoInterface $url): static
    {
        $this->thumbnail = [
          'url' => $url->value(),
        ];
        return $this;
    }
    public function setAuthor(StringVoInterface $name, StringVoInterface $url, StringVoInterface $iconUrl): static
    {
        $this->author = [
          'name' => $name->value(),
          'url' => $url->value(),
          'icon_url' => $iconUrl->value(),
        ];
        return $this;
    }
    public function addField(StringVoInterface $name, SacralTypeVoInterface $value, null|BoolVoInterface $inline = null): static
    {
        $this->fields[] = [
          'name' => $name->value(),
          'value' => $value->value(),
          'inline' => $inline?->value() ?? false,
        ];
        return $this;
    }

    /**
     * @return array<string, null|string|int|float|array<mixed>>
     */
    public function toArray(): array
    {
        return [
          'title' => $this->title?->value(),
          'type' => "rich",
          'description' => $this->description?->value(),
          'url' => $this->titleUrl?->value(),
          'color' => $this->color?->decoded(),
          'footer' => $this->footer,
          'image' => $this->image,
          'thumbnail' => $this->thumbnail,
          'timestamp' => $this->timestamp?->formatted(),
          'author' => $this->author,
          'fields' => $this->fields
        ];
    }
}
