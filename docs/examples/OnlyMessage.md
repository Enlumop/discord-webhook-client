# Simple example

```php
<?php
use EnterV\DiscordWebhooks\Payload;
use EnterV\DiscordWebhooks\WebhookClient;

$url = 'DISCORD_WEBHOOK_URL'; // Put your discord webhook url

// Create Payload
$payload = new Payload();
$payload->setMessage('This is a message'); // Some text. If You need use the Message Builder

// New discord webhook client
$webhook = new WebhookClient();
// Send message
$webhook->send($url, $payload);
```
