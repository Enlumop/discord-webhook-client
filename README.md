![Source Code](https://img.shields.io/badge/enterv%2Fdiscord-webhooks?label=source&link=https%3A%2F%2Fgithub.com%2FEnterVPL%2Fdiscord-webhooks%2Fblob%2Fmaster%2Fcomposer.json) ![GitHub](https://img.shields.io/github/license/EnterVPL/discord-webhooks) ![GitHub tag (with filter)](https://img.shields.io/github/v/tag/entervpl/discord-webhooks) ![GitHub last commit (by committer)](https://img.shields.io/github/last-commit/EnterVPL/discord-webhooks)


![Static analysis](https://github.com/EnterVPL/discord-webhooks/workflows/Static%20analysis/badge.svg)

# discord-webhooks

Discord webhooks is a professional client for Discord's webhook API.

## Getting Started
### Requirements
- PHP >= 8.1
### Install via composer (not available yet)
`composer require enterv/discord-webhooks`
## Usage

Example:

```php
<?php

declare(strict_types=1);

require_once('vendor/autoload.php');

use EnterV\DiscordWebhooks\Embed;
use EnterV\DiscordWebhooks\Payload;
use EnterV\DiscordWebhooks\ValueObject\LongText;
use EnterV\DiscordWebhooks\ValueObject\ShortText;
use EnterV\DiscordWebhooks\ValueObject\Url;
use EnterV\DiscordWebhooks\WebhookClient;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

$embed = new Embed();
$embed->setDescription(new LongText("This is an embed"));

$url = new Url($_ENV["WEBHOOK_URL"]);

$payload = new Payload();
$payload->setUsername(new ShortText("Example Webhook Bot"))
    ->setMessage(new LongText("This is a message"))
    ->setEmbed($embed);

$webhook = new WebhookClient();
$webhook->send($url, $payload);

```

## License

The project is MIT licensed. To read the full license, open [LICENSE.md](LICENSE.md).

## Contributing

Pull requests and issues are open!
