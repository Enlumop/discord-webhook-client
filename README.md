[![Latest Stable Version](http://poser.pugx.org/enterv/discord-webhooks/v)](https://packagist.org/packages/enterv/discord-webhooks) [![Total Downloads](http://poser.pugx.org/enterv/discord-webhooks/downloads)](https://packagist.org/packages/enterv/discord-webhooks) [![Latest Unstable Version](http://poser.pugx.org/enterv/discord-webhooks/v/unstable)](https://packagist.org/packages/enterv/discord-webhooks) [![License](http://poser.pugx.org/enterv/discord-webhooks/license)](https://packagist.org/packages/enterv/discord-webhooks) [![PHP Version Require](http://poser.pugx.org/enterv/discord-webhooks/require/php)](https://packagist.org/packages/enterv/discord-webhooks)

![Source Code](https://img.shields.io/badge/enterv%2Fdiscord-webhooks?label=source&link=https%3A%2F%2Fgithub.com%2FEnterVPL%2Fdiscord-webhooks%2Fblob%2Fmaster%2Fcomposer.json) ![GitHub tag (with filter)](https://img.shields.io/github/v/tag/entervpl/discord-webhooks) ![GitHub last commit (by committer)](https://img.shields.io/github/last-commit/EnterVPL/discord-webhooks)

![Static analysis](https://github.com/EnterVPL/discord-webhooks/workflows/Static%20analysis/badge.svg)

# discord-webhooks

Discord webhooks is a professional client for Discord's webhook API.

## Getting Started

### Requirements

- PHP >= 8.1

### Install via composer (not available yet)

`composer require enterv/discord-webhooks`

## Usage

Example

```php
<?php
use EnterV\DiscordWebhooks\Embed;
use EnterV\DiscordWebhooks\Payload;
use EnterV\DiscordWebhooks\WebhookClient;

$embed = new Embed();
$embed->setDescription('This is an embed');

$url = 'https://YOUR_WEBHOOKS_URL';

$payload = new Payload();
$payload->setUsername('Example Webhook Bot')
    ->setMessage('This is a message')
    ->setEmbed($embed)
;

$webhook = new WebhookClient();
$webhook->send($url, $payload);


```

## License

The project is MIT licensed. To read the full license, open [LICENSE.md](LICENSE.md).

## Contributing

Pull requests and issues are open!
