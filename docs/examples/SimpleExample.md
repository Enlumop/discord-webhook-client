# Simple example

```php
<?php
use EnterV\DiscordWebhooks\Embed;
use EnterV\DiscordWebhooks\Payload;
use EnterV\DiscordWebhooks\WebhookClient;

// Create embed
$embed = new Embed();
$embed->setDescription('This is an embed'); // with description

$url = 'DISCORD_WEBHOOK_URL'; // Put your discord webhook url

// Create Payload
$payload = new Payload();
$payload->setUsername('Example Webhook Bot') // Change discord bot webhook username
    ->setMessage('This is a message') // Some text before embed
    ->addEmbed($embed) // Add embed
;

// New discord webhook client
$webhook = new WebhookClient();
// Send message
$webhook->send($url, $payload);
```
