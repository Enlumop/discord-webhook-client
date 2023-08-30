# Simple Message Example

```php
<?php
use EnterV\DiscordWebhooks\Payload;
use EnterV\DiscordWebhooks\WebhookClient;

$url = 'DISCORD_WEBHOOK_URL'; // Put your discord webhook url

// Create Payload
$payload = new Payload();

// Create some message
$message = "<@ROLE_ID> How are you? It's time to new......";

// Set message
$payload->setMessage($message);

// Send message
$webhook = new WebhookClient();
$webhook->send($url, $payload);
```
