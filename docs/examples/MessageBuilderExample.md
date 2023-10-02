# Message Builder Example

```php
<?php
use Enlumop\DiscordWebhooks\Builder\TextFormattingCombine;
use Enlumop\DiscordWebhooks\Builder\TextMessageBuilder;
use Enlumop\DiscordWebhooks\Payload;
use Enlumop\DiscordWebhooks\WebhookClient;

$url = 'DISCORD_WEBHOOK_URL'; // Put your discord webhook url

// Builder with on auto-newline mode (to disable auto-newline use new TextMessageBuilder(false))
$messageBuilder = new TextMessageBuilder();
$message = $messageBuilder->addText('<@ROLE_ID>') // ping some role
    ->addText('How are you?') // some text without format
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

// Create Payload
$payload = new Payload();
 // Set message
$payload->setMessage($message);

// Send message
$webhook = new WebhookClient();
$webhook->send($url, $payload);
```

You can also use [Message Builder with embed](./MessageBuilderWithEmbedExample.md) e.g. to field or description
