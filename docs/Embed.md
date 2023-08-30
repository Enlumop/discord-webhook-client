# Embed

The [Embed](../src/Embed.php) class implement [EmbedInterface](../src/Interface/Embed/EmbedInterface.php), which in turn inherits from two interfaces: [SetEmbedInterface](../src/Interface/Embed/SetEmbedInterface.php) and [GetEmbedInterface](../src/Interface/Embed/GetEmbedInterface.php)

## [GetEmbedInterface](../src/Interface/Embed/GetEmbedInterface.php)

[Payload::setEmbed](../src/Payload.php#L41) requires only an object of the [GetEmbedInterface](../src/Interface/Embed/GetEmbedInterface.php) type as an argument, which means that you can omit the entire Embed class and define your own templates, which will, like the Embed class, return all components required for Payload in the [GetEmbedInterface::toArray](../src/Interface/Embed/GetEmbedInterface.php#L26) method

## [SetEmbedInterface](../src/Interface/Embed/SetEmbedInterface.php)

The [Embed](../src/Embed.php) class, thanks to the [SetEmbedInterface](../src/Interface/Embed/SetEmbedInterface.php) implementation, offers the following methods:

- `setTitle` - set title
- `setTitleUrl` - set title url
- `setDescription` - to set description
- `setTimestamp` - to set timestamp
- `setColor` - to set bar color
- `setFooter` - to set footer
- `setImage` - to set image
- `setThumbnail` - to set thumbnail
- `setAuthor` - to set author wtih author url
- `addField` - to add field

All setters implement the Fluent Interface pattern.

## Example

```php
$embed = new Embed();
$embed->setAuthor("author name", "author url", "author avatar url")
    ->setColor(new Color('12FA11'))
    ->setDescription('Some description')
    ->setFooter('Some text', 'some url')
    ->setImage('some image url')
    ->setThumbnail('some image url')
    ->setTimestamp(new DateTime('now'))
    ->setTitle('some title')
    ->setTitleUrl('some title url')
    ->addField('some field title', 'some field value')
    ->addField('other field title', 123)
;
```
