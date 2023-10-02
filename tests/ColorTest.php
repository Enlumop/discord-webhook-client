<?php

declare(strict_types=1);

namespace Enlumop\DiscordWebhooks\Test;

use Enlumop\DiscordWebhooks\Color;
use Enlumop\DiscordWebhooks\Exception\Color\ColorException;
use Enlumop\DiscordWebhooks\Helper\ColorHelper;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * Class TextMessageBuilderTest.
 *
 * @covers \Enlumop\DiscordWebhooks\Embed
 *
 * @internal
 */
final class ColorTest extends TestCase
{
    /**
     * @return array<int, mixed>
     */
    public static function validColorProvier(): array
    {
        $faker = \Faker\Factory::create();

        return [
            [
                $faker->safeHexColor(),
            ],
            [
                $faker->safeHexColor(),
            ],
            [
                $faker->safeHexColor(),
            ],
        ];
    }

    #[DataProvider('validColorProvier')]
    public function testColor(string $hexcolor): void
    {
        $color = new Color($hexcolor);

        self::assertSame(hexdec($hexcolor), $color->toInt());
    }

    /**
     * @return array<int, mixed>
     */
    public static function invalidColorProvier(): array
    {
        $faker = \Faker\Factory::create();

        return [
            [
                $faker->text(),
            ],
            [
                $faker->hslColor(),
            ],
            [
                $faker->phoneNumber(),
            ],
        ];
    }

    #[DataProvider('invalidColorProvier')]
    public function testExceptionColor(string $invalidColor): void
    {
        $this->expectException(ColorException::class);
        ColorHelper::convertShortRGBToFull($invalidColor);
    }
}
