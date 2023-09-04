# TextMessageBuilder

The [TextMessageBuilder](../src/Builder/TextMessageBuilder.php) class implement [MessageBuilderInterface](../src/Builder/Interface/MessageBuilderInterface.php), which in turn inherits from one interface: [SetMessageBuilderInterface](../src/Builder/Interface/SetMessageBuilderInterface.php)

## Constructor

- `autoNewLine` - bool default: true. This tells the builder if you want to use the auto-newline mode. While this mode is on, each use of the method that adds text adds a new line.

## [MessageBuilderInterface](../src/Builder/Interface/MessageBuilderInterface.php)

### Methods

- `build` - Returns a formatted string

## [SetMessageBuilderInterface](../src/Builder/Interface/SetMessageBuilderInterface.php)

The [TextMessageBuilder](../src/Builder/TextMessageBuilder.php) class, thanks to the [SetMessageBuilderInterface](../src/Builder/Interface/SetMessageBuilderInterface.php) implementation, offers the following methods:

- `addText` - Text added with this method will not have the format.
- `addNewLine` - Adds a new line. It's useful if you've decided not to use the automatic newline that works every time you use append text
- `addBold` - Added text with **bold** format
- `addItalic` - Added text with *italic* format
- `addUnderline` - Added text with \_\_underline\_\_ format
- `addStrikethrough` - Added text with ~~strikethrough~~ format
- `addList` - Added text with list format
- `addCodeBlock` - Added text with `codeblock` format
- `addMultilineCodeBlock` - Added text with

```txt
multiline codeblock format
```

- `addQuoteBlock` - Added text with

> quote format

- `addMultilineQuoteBlock` - Added text with

>>> multiline
quote
format

Be careful with the use. Discord for some reason can't always tell when you want to stop using a multiline quote block.

- `addCombineTextFormatting` - Added text with ***combine*** format

All setters implement the Fluent Interface pattern.

## Examples

An example usage can be found in: [MessageBuilderExample](./examples/MessageBuilderExample.md)
