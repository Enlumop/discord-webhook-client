# Payload

The [Payload](../src/Payload.php) class implement [PayloadInterface](../src/Interface/Payload/PayloadInterface.php), which in turn inherits from two interfaces: [SetPayloadInterface](../src/Interface/Payload/SetPayloadInterface.php) and [GetPayloadInterface](../src/Interface/Payload/GetPayloadInterface.php)

## [GetPayloadInterface](../src/Interface/Payload/GetPayloadInterface.php)

[WebhookClient::send](../src/WebhookClient.php#L20) requires only an object of the [GetPayloadInterface](../src/Interface/Payload/GetPayloadInterface.php) type as an argument, which means that you can omit the entire Payload class and define your own templates, which will, like the Payload class, return all components required for Payload in the [GetPayloadInterface::toArray](../src/Interface/Payload/GetPayloadInterface.php#L12) method

## [SetPayloadInterface](../src/Interface/Payload/SetPayloadInterface.php)

The [Payload](../src/Payload.php) class, thanks to the [SetPayloadInterface](../src/Interface/Payload/SetPayloadInterface.php) implementation, offers the following methods:

- `setUsername` - to set webhook bot name
- `setAvatarUrl` - set webhook bot avatar
- `setMessage` - to set a text message
- `setEmbed` - to add [embed](Embed.md)
- `setTts` - to set or unset TTS

All setters implement the Fluent Interface pattern.

## Examples

### Only embed

```php
$payload = new Payload();
$payload->setEmbed($embed) // @see Embed.md
;
```

### If you want change avatar or username then

```php
$payload = new Payload();
$payload->setAvatarUrl("Webhook Bot Avatar URL")
    ->setUsername("Webhook Bot Name")
;
```

### If you need send some text before embed then use

```php
$payload = new Payload();
$payload->setMessage("Some message")
    ->setEmbed($embed) // @see Embed.md
;
```

### With all setters

```php
$payload = new Payload();
$payload->setAvatarUrl("Webhook Bot Avatar URL")
    ->setUsername("Webhook Bot Name")
    ->setMessage("Some message")
    ->setTts(false) // or true.. if you want it
    ->setEmbed($embed) // @see Embed.md
;
```
