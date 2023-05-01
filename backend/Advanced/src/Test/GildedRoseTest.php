<?php

namespace Dyflexis\Applicants\Test;

use Dyflexis\Applicants\GildedRose;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    /**
     * @test
     * @dataProvider breadItems
     * @dataProvider brieItems
     * @dataProvider manaDrinkItems
     */
    public function it_updates_the_item(GildedRose $item, int $expectedQuality, int $expectedSellIn): void
    {
        $item->tick();

        self::assertEquals($item->quality, $expectedQuality);
        self::assertEquals($item->sellIn, $expectedSellIn);
    }

    public static function breadItems(): array
    {
        return [
            'it decreases quality and sell-in before sell-in date for Bread' => [
                'item' => GildedRose::of('Bread', 10, 5),
                'expectedQuality' => 9,
                'expectedSellIn' => 4,
            ],
            'it decreases quality twice as fast when the sell-in date has been reached for Bread' => [
                'item' => GildedRose::of('Bread', 10, 0),
                'expectedQuality' => 8,
                'expectedSellIn' => -1,
            ],
            'it decreases quality twice as fast after the sell-in date for Bread' => [
                'item' => GildedRose::of('Bread', 10, -5),
                'expectedQuality' => 8,
                'expectedSellIn' => -6,
            ],
            'it does not decrease quality lower than 0 for Bread' => [
                'item' => GildedRose::of('Bread', 0, 5),
                'expectedQuality' => 0,
                'expectedSellIn' => 4,
            ],
        ];
    }

    public static function brieItems(): array
    {
        return [
            'it decreases the sell-in but increases the quality before sell-in date for Aged Brie' => [
                'item' => GildedRose::of('Aged Brie', 10, 5),
                'expectedQuality' => 11,
                'expectedSellIn' => 4,
            ],
            'it increases quality twice as fast when sell-in date has been reached for Aged Brie' => [
                'item' => GildedRose::of('Aged Brie', 10, 0),
                'expectedQuality' => 12,
                'expectedSellIn' => -1,
            ],
            'it does not increase quality past 50 for Aged Brie' => [
                'item' => GildedRose::of('Aged Brie', 50, 5),
                'expectedQuality' => 50,
                'expectedSellIn' => 4,
            ],
            'it does not increase quality past 50 even when a tick would take it over 50 for Aged Brie' => [
                'item' => GildedRose::of('Aged Brie', 49, 0),
                'expectedQuality' => 50,
                'expectedSellIn' => -1,
            ],
            'it decreases sell-in even after the sell-in date has been reached and quality is at maximum for Aged Brie' => [
                'item' => GildedRose::of('Aged Brie', 50, 0),
                'expectedQuality' => 50,
                'expectedSellIn' => -1,
            ],
        ];
    }

    public static function manaDrinkItems(): array
    {
        return [
            'it decreases sell-in and decreases quality twice as fast before sell-in date for Mana Drink' => [
                'item' => GildedRose::of('Mana Drink', 10, 5),
                'expectedQuality' => 8,
                'expectedSellIn' => 4,
            ],
            'it decreases quality twice as fast when the sell-in date has been reached for Mana Drink' => [
                'item' => GildedRose::of('Mana Drink', 10, 0),
                'expectedQuality' => 6,
                'expectedSellIn' => -1,
            ],
            'it decreases quality twice as fast after the sell-in date for Mana Drink' => [
                'item' => GildedRose::of('Mana Drink', 10, -5),
                'expectedQuality' => 6,
                'expectedSellIn' => -6,
            ],
            'it does not decrease quality lower than 0 for Mana Drink' => [
                'item' => GildedRose::of('Mana Drink', 0, 5),
                'expectedQuality' => 0,
                'expectedSellIn' => 4,
            ],
        ];
    }
}
