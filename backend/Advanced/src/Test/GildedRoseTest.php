<?php

namespace Dyflexis\Applicants\Test;

use Dyflexis\Applicants\GildedRose;
use Dyflexis\Applicants\Items\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    /**
     * @test
     * @dataProvider breadItems
     * @dataProvider brieItems
     * @dataProvider sulfurasItems
     * @dataProvider backstagePassItems
     * @dataProvider manaDrinkItems
     */
    public function it_updates_the_item(Item $item, int $expectedQuality, int $expectedSellIn): void
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

    public static function sulfurasItems(): array
    {
        return [
            'it does not decrease the sell-in and does not change the quality for Sulfuras' => [
                'item' => GildedRose::of('Sulfuras, Hand of Ragnaros', 80, 5),
                'expectedQuality' => 80,
                'expectedSellIn' => 5,
            ],
        ];
    }

    public static function backstagePassItems(): array
    {
        return [
            'it decreases the sell-in but increases the quality before sell-in date for Backstage passes' => [
                'item' => GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 10, 12),
                'expectedQuality' => 11,
                'expectedSellIn' => 11,
            ],
            'it increases quality twice as fast when sell-in date is 10 days or less for Backstage passes' => [
                'item' => GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 10, 10),
                'expectedQuality' => 12,
                'expectedSellIn' => 9,
            ],
            'it increases quality twice as fast when sell-in date is 5 days or less for Backstage passes' => [
                'item' => GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 10, 5),
                'expectedQuality' => 13,
                'expectedSellIn' => 4,
            ],
            'it does not increase quality past 50 for Backstage passes' => [
                'item' => GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 50, 5),
                'expectedQuality' => 50,
                'expectedSellIn' => 4,
            ],
            'it does not increase quality past 50 even when a tick would take it over 50 for Backstage passes' => [
                'item' => GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 49, 2),
                'expectedQuality' => 50,
                'expectedSellIn' => 1,
            ],
            'it decreases sell-in even after the sell-in date has been reached and decreases quality to 0 for Backstage passes' => [
                'item' => GildedRose::of('Backstage passes to a TAFKAL80ETC concert', 50, 0),
                'expectedQuality' => 0,
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
