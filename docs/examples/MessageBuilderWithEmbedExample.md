# Message Builder with Embed Example

```php
<?php
use Enlumop\DiscordWebhooks\Builder\TextFormattingCombine;
use Enlumop\DiscordWebhooks\Builder\TextMessageBuilder;
use Enlumop\DiscordWebhooks\Payload;
use Enlumop\DiscordWebhooks\WebhookClient;

$url = 'DISCORD_WEBHOOK_URL'; // Put your discord webhook url

// Builder with on auto-newline mode (to disable auto-newline use new TextMessageBuilder(false))
$messageBuilder = new TextMessageBuilder();
$text = $messageBuilder->addText('How are you?') // some text without format
    ->addBold("It's time for new webhook tool!") // **Text with bold**
    /**
     * Text with multiline codeblock:
     * ```php
     * // It's can using codeblock
     * ```
     */
    ->addMultilineCodeBlock("// It's can using codeblock", 'php')
    ->addQuoteBlock('And some quote!') // > Text with quote block
    ->addCombineTextFormatting(
        "It's awesome!!!111oneone",
        (new TextFormattingCombine())
            ->withBold()
            ->withItalic()
            ->withUnderline()
    ) // ***__Text with: Bold, Italic and Underline__***
    ->addText('Are you reade for this??')
    ->build() // build message (it was returned string)
;

// Create embed
$embed = new Embed();
$embed->addField('Field title', $text); // add field

// Create Payload
$payload = new Payload();
$payload->addEmbed($embed) // Add embed

// Send message
$webhook = new WebhookClient();
$webhook->send($url, $payload);
```
