<?php

declare(strict_types=1);

namespace Enlumop\DiscordWebhooks;

use Enlumop\JsonMapper\Attribute\JsonMap;

class WebhookMessage
{
    #[JsonMap()]
    public string $id;
    #[JsonMap()]
    public int $type;
    #[JsonMap(type: DiscordAccount::class)]
    public DiscordAccount $author;
    #[JsonMap(type: 'string')]
    public null|string $content = null;
    #[JsonMap()]
    public string $channelId;
    #[JsonMap()]
    public bool $pinned = false;
    #[JsonMap()]
    public bool $tts = false;
    #[JsonMap()]
    public string $timestamp;
    #[JsonMap(type: 'string')]
    public null|string $editedTimestamp = null;
    #[JsonMap()]
    public int $flags;
    #[JsonMap()]
    public string $webhookId;

    /**
     * @var array<string>
     */
    #[JsonMap(type: 'array<string>')]
    public array $mentionRoles = [];
    #[JsonMap()]
    public bool $mentionEveryone = false;

    /**
     * @var array<DiscordAccount>
     */
    #[JsonMap(type: 'array<'.DiscordAccount::class.'>')]
    public array $mentions = [];

    /**
     * @var array<mixed>
     */
    #[JsonMap()]
    public array $attachments = [];

    /**
     * @var array<mixed>
     */
    #[JsonMap()]
    public array $components = [];

    /**
     * @var array<Embed>
     */
    #[JsonMap(type: 'array<'.Embed::class.'>')]
    public array $embeds = [];
}
