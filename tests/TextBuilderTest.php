<?php

declare(strict_types=1);

namespace Enlumop\DiscordWebhooks\Test;

use Enlumop\DiscordWebhooks\Builder\TextFormattingCombine;
use Enlumop\DiscordWebhooks\Builder\TextMessageBuilder;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * Class TextMessageBuilderTest.
 *
 * @covers \Enlumop\DiscordWebhooks\Builder\TextMessageBuilder
 *
 * @internal
 */
final class TextBuilderTest extends TestCase
{
    private null|TextMessageBuilder $textMessageBuilder;
    private string $text;

    protected function setUp(): void
    {
        $faker = \Faker\Factory::create();
        $this->textMessageBuilder = new TextMessageBuilder(false);
        $this->text = $faker->text();
    }

    protected function tearDown(): void
    {
        $this->textMessageBuilder = null;
        $this->text = '';
    }

    /**
     * @return array<int, mixed>
     */
    public static function codeWithLang(): array
    {
        $faker = \Faker\Factory::create();

        return [
            [
                "<?php echo '{$faker->text()}' ?>",
                'php',
            ],
            [
                "# {$faker->text()}",
                'md',
            ],
            [
                "<h1>{$faker->text()}</h1>",
                'html',
            ],
        ];
    }

    public function testBuild(): void
    {
        $message = $this->textMessageBuilder?->addText($this->text)
            ->build()
        ;
        self::assertSame($this->text, $message);
    }

    public function testAddText(): void
    {
        $message = $this->textMessageBuilder?->addText($this->text)
            ->build()
        ;
        self::assertSame($this->text, $message);
    }

    public function testAddNewLine(): void
    {
        $textMessageBuilder = new TextMessageBuilder(true);
        $message = $textMessageBuilder->addText($this->text)
            ->build()
        ;
        self::assertSame($this->text."\n", $message);
    }

    public function testAddBold(): void
    {
        $message = $this->textMessageBuilder?->addBold($this->text)
            ->build()
        ;
        self::assertSame("**{$this->text}**", $message);
    }

    public function testAddItalic(): void
    {
        $message = $this->textMessageBuilder?->addItalic($this->text)
            ->build()
        ;
        self::assertSame("*{$this->text}*", $message);
    }

    public function testAddUnderline(): void
    {
        $message = $this->textMessageBuilder?->addUnderline($this->text)
            ->build()
        ;
        self::assertSame("__{$this->text}__", $message);
    }

    public function testAddStrikethrough(): void
    {
        $message = $this->textMessageBuilder?->addStrikethrough($this->text)
            ->build()
        ;
        self::assertSame("~~{$this->text}~~", $message);
    }

    public function testAddList(): void
    {
        $message = $this->textMessageBuilder?->addList($this->text)
            ->build()
        ;
        self::assertSame("- {$this->text}", $message);
    }

    public function testAddListWithIndentation(): void
    {
        $message = $this->textMessageBuilder?->addList($this->text, 1)
            ->build()
        ;
        self::assertSame("  - {$this->text}", $message);
    }

    public function testAddCodeBlock(): void
    {
        $message = $this->textMessageBuilder?->addCodeBlock($this->text)
            ->build()
        ;
        self::assertSame("`{$this->text}`", $message);
    }

    public function testAddMultilineCodeBlock(): void
    {
        $message = $this->textMessageBuilder?->addMultilineCodeBlock($this->text)
            ->build()
        ;
        self::assertSame("```\n{$this->text}\n```", $message);
    }

    #[DataProvider('codeWithLang')]
    public function testAddMultilineCodeBlockWithLang(string $text, string $lang): void
    {
        $message = $this->textMessageBuilder?->addMultilineCodeBlock($text, $lang)
            ->build()
        ;
        self::assertSame("```{$lang}\n{$text}\n```", $message);
    }

    public function testAddQuoteBlock(): void
    {
        $message = $this->textMessageBuilder?->addQuoteBlock($this->text)
            ->build()
        ;
        self::assertSame("> {$this->text}", $message);
    }

    public function testAddMultilineQuoteBlock(): void
    {
        $message = $this->textMessageBuilder?->addMultilineQuoteBlock($this->text)
            ->build()
        ;
        self::assertSame(">>> {$this->text}", $message);
    }

    public function testAddCombineTextFormatting(): void
    {
        $combineFormat = new TextFormattingCombine();
        $combineFormat->withBold()
            ->withItalic()
            ->withListElement()
            ->withQuoteBlock()
        ;
        $message = $this->textMessageBuilder?->addCombineTextFormatting($this->text, $combineFormat)
            ->build()
        ;
        self::assertSame("> - ***{$this->text}***", $message);
    }
}
