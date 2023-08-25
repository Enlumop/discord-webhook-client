<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Interface\Embed;

use EnterV\Voi\BoolVoInterface;
use EnterV\Voi\ColorDecodedVoInterface;
use EnterV\Voi\FormattedDateTimeVoInterface;
use EnterV\Voi\SacralTypeVoInterface;
use EnterV\Voi\StringVoInterface;

interface SetEmbedInterface
{
    public function setTitle(StringVoInterface $title): static;

    public function setTitleUrl(StringVoInterface $url): static;

    public function setDescription(StringVoInterface $description): static;

    public function setTimestamp(FormattedDateTimeVoInterface $timestamp): static;

    public function setColor(ColorDecodedVoInterface $color): static;

    public function setFooter(StringVoInterface $text, null|StringVoInterface $iconUrl = null): static;

    public function setImage(StringVoInterface $url): static;

    public function setThumbnail(StringVoInterface $url): static;

    public function setAuthor(StringVoInterface $name, StringVoInterface $url, StringVoInterface $iconUrl): static;

    public function addField(StringVoInterface $name, SacralTypeVoInterface $value, null|BoolVoInterface $inline = null): static;
}
