<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Test;

use EnterV\DiscordWebhooks\Builder\TextFormattingCombine;
use EnterV\DiscordWebhooks\Builder\TextMessageBuilder;
use EnterV\Voi\StringVoInterface;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * Class TextMessageBuilderTest.
 *
 * @covers \EnterV\DiscordWebhooks\Builder\TextMessageBuilder
 *
 * @internal
 */
final class TextBuilderTest extends TestCase
{
    private ?TextMessageBuilder $textMessageBuilder;
    private ?StringVoInterface $textVo;

    protected function setUp(): void
    {
        $this->textMessageBuilder = new TextMessageBuilder(false);
        $this->textVo = $this->createStub(StringVoInterface::class);
        $this->textVo->method('value')
            ->willReturn('Stub value')
            ->willReturn('Another stub value')
            ->willReturn('It is an intermediate value describing itself')
        ;
    }

    protected function tearDown(): void
    {
        $this->textMessageBuilder = null;
        $this->textVo = null;
    }

    /**
     * @return array<int, mixed>
     */
    public static function codeWithLang(): array
    {
        return [
            [
                "<?php echo 'Some code in PHP ?>'",
                'php',
            ],
            [
                '# This is markdown text',
                'md',
            ],
            [
                '<h1>And some HTML</h1>',
                'html',
            ],
        ];
    }

    public function testBuild(): void
    {
        $message = $this->textMessageBuilder->addText($this->textVo)
            ->build()
        ;
        self::assertSame($this->textVo->value(), $message->value());
    }

    public function testAddText(): void
    {
        $message = $this->textMessageBuilder->addText($this->textVo)
            ->build()
        ;
        self::assertSame($this->textVo->value(), $message->value());
    }

    public function testAddNewLine(): void
    {
        $textMessageBuilder = new TextMessageBuilder(true);
        $message = $textMessageBuilder->addText($this->textVo)
            ->build()
        ;
        self::assertSame($this->textVo->value()."\n", $message->value());
    }

    public function testAddBold(): void
    {
        $message = $this->textMessageBuilder->addBold($this->textVo)
            ->build()
        ;
        self::assertSame("**{$this->textVo->value()}**", $message->value());
    }

    public function testAddItalic(): void
    {
        $message = $this->textMessageBuilder->addItalic($this->textVo)
            ->build()
        ;
        self::assertSame("*{$this->textVo->value()}*", $message->value());
    }

    public function testAddUnderline(): void
    {
        $message = $this->textMessageBuilder->addUnderline($this->textVo)
            ->build()
        ;
        self::assertSame("__{$this->textVo->value()}__", $message->value());
    }

    public function testAddStrikethrough(): void
    {
        $message = $this->textMessageBuilder->addStrikethrough($this->textVo)
            ->build()
        ;
        self::assertSame("~~{$this->textVo->value()}~~", $message->value());
    }

    public function testAddList(): void
    {
        $message = $this->textMessageBuilder->addList($this->textVo)
            ->build()
        ;
        self::assertSame("- {$this->textVo->value()}", $message->value());
    }

    public function testAddListWithIndentation(): void
    {
        $message = $this->textMessageBuilder->addList($this->textVo, 1)
            ->build()
        ;
        self::assertSame("  - {$this->textVo->value()}", $message->value());
    }

    public function testAddCodeBlock(): void
    {
        $message = $this->textMessageBuilder->addCodeBlock($this->textVo)
            ->build()
        ;
        self::assertSame("`{$this->textVo->value()}`", $message->value());
    }

    public function testAddMultilineCodeBlock(): void
    {
        $message = $this->textMessageBuilder->addMultilineCodeBlock($this->textVo)
            ->build()
        ;
        self::assertSame("```\n{$this->textVo->value()}\n```", $message->value());
    }

    #[DataProvider('codeWithLang')]
    public function testAddMultilineCodeBlockWithLang(string $text, string $lang): void
    {
        $message = $this->textMessageBuilder->addMultilineCodeBlock($text, $lang)
            ->build()
        ;
        self::assertSame("```{$lang}\n{$text}\n```", $message->value());
    }

    public function testAddQuoteBlock(): void
    {
        $message = $this->textMessageBuilder->addQuoteBlock($this->textVo)
            ->build()
        ;
        self::assertSame("> {$this->textVo->value()}", $message->value());
    }

    public function testAddMultilineQuoteBlock(): void
    {
        $message = $this->textMessageBuilder->addMultilineQuoteBlock($this->textVo)
            ->build()
        ;
        self::assertSame(">>> {$this->textVo->value()}", $message->value());
    }

    public function testAddCombineTextFormatting(): void
    {
        $combineFormat = new TextFormattingCombine();
        $combineFormat->withBold()
            ->withItalic()
            ->withListElement()
            ->withQuoteBlock()
        ;
        $message = $this->textMessageBuilder->addCombineTextFormatting($this->textVo, $combineFormat)
            ->build()
        ;
        self::assertSame("> - ***{$this->textVo->value()}***", $message->value());
    }
}
