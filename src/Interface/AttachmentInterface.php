<?php

declare(strict_types=1);

namespace Enlumop\DiscordWebhooks\Interface;

interface AttachmentInterface
{
    public function getId(): int;

    public function getFilename(): string;

    public function getDescription(): ?string;

    public function getContentType(): ?string;

    public function getSize(): int;

    public function getUrl(): string;

    public function getProxyUrl(): string;

    public function getHeight(): ?int;

    public function getWidth(): ?int;

    public function isEphemeral(): bool;

    public function getDurationSecs(): ?float;

    public function getWaveform(): ?string;

    public function getFlags(): int;
}
