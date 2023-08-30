# WebhookClient

The [WebhookClient](../src/WebhookClient.php) class implement [WebhookClientInterface](../src/Interface/WebhookClient/WebhookClientInterface.php) which gives us the following method:

- `send` - For proper sending, all you need is the appropriate webhook url and a [Payload](Payload.md) object. The third parameter `$options` is optional and applies to the request. Check out: <https://docs.guzzlephp.org/en/stable/request-options.html>

## Examples

### Simple use

```php
$webhookUrl = "Your webhook url";

$client = new WebhookClient();
$client->send($webhookUrl, $payload);
```

### With options

See: <https://docs.guzzlephp.org/en/stable/request-options.html>

```php
$options = [
    \GuzzleHttp\RequestOptions::VERIFY => false, // This is just an example of disabling certificate validation. This is not recommended.
    \GuzzleHttp\RequestOptions::TIMEOUT => 3
];
$webhookUrl = "Your webhook url";

$client = new WebhookClient();
$client->send($webhookUrl, $payload, $options);
```
