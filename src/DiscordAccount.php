<?php

declare(strict_types=1);

namespace Enlumop\DiscordWebhooks;

use Enlumop\JsonMapper\Attribute\JsonMap;

class DiscordAccount
{
    #[JsonMap()]
    public string $id;
    #[JsonMap()]
    public string $username;
    #[JsonMap(type: 'string')]
    public null|string $avatar = null;
    #[JsonMap()]
    public string $discriminator;
    #[JsonMap()]
    public int $publicFlags;
    #[JsonMap()]
    public int $flags;
    #[JsonMap(type: 'string')]
    public null|string $banner = null;
    #[JsonMap(type: 'int')]
    public null|int $accentColor = null;
    #[JsonMap(type: 'string')]
    public null|string $globalName = null;
    #[JsonMap(type: 'string')]
    public null|string $avatarDecorationData = null;
    #[JsonMap(type: 'string')]
    public null|string $bannerColor = null;
    #[JsonMap()]
    public bool $bot;
}
