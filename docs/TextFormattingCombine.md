# TextFormattingCombine

The [TextFormattingCombine](../src/Builder/TextFormattingCombine.php) class implement [TextFormattingCombineInterface](../src/Builder/Interface/TextFormattingCombineInterface.php), which in turn inherits from two interfaces: [SetTextFormattingCombineInterface](../src/Builder/Interface/SetTextFormattingCombineInterface.php) and [GetTextFormattingCombineInterface](../src/Builder/Interface/GetTextFormattingCombineInterface.php)

## [GetTextFormattingCombineInterface](../src/Builder/Interface/GetTextFormattingCombineInterface.php)

All getters return a bool type. They are mainly for internal library use. Their public implementation made library development easier. I don't see the need for you to have to use them in your project:

- `isBold`
- `isItalic`
- `isUnderline`
- `isStrikethrough`
- `isListElement`
- `isQuoteBlock`
- `isMultilineQuoteBlock`

## [SetTextFormattingCombineInterface](../src/Builder/Interface/SetTextFormattingCombineInterface.php)

The [TextFormattingCombine](../src/Builder/TextFormattingCombine.php) class, thanks to the [SetTextFormattingCombineInterface](../src/Builder/Interface/SetTextFormattingCombineInterface.php) implementation, offers the following methods:

- `withBold`
- `withItalic`
- `withUnderline`
- `withStrikethrough`
- `withList`
- `withQuoteBlock`
- `withMultilineQuoteBlock`

All setters implement the Fluent Interface pattern.
All formats are presents in [TextMessageBuilder](./TextMessageBuilder.md#L15)

## Examples

An example usage can be found in [MessageBuilderExample](./examples/MessageBuilderExample.md#L27)
