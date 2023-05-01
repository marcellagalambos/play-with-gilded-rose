<?php

namespace Dyflexis\Applicants;

use Dyflexis\Applicants\Items\AgedBrie;
use Dyflexis\Applicants\Items\BackstagePass;
use Dyflexis\Applicants\Items\Bread;
use Dyflexis\Applicants\Items\Item;
use Dyflexis\Applicants\Items\ManaDrink;
use Dyflexis\Applicants\Items\Sulfuras;

class GildedRose
{

    public static function of($name, $quality, $sellIn) : ?Item
    {
        switch ($name) {
            case 'Bread':
                return new Bread($name, $quality, $sellIn);
            case 'Aged Brie':
                return new AgedBrie($name, $quality, $sellIn);
            case 'Sulfuras, Hand of Ragnaros':
                return new Sulfuras($name, $quality, $sellIn);
            case 'Backstage passes to a TAFKAL80ETC concert':
                return new BackstagePass($name, $quality, $sellIn);
            case 'Mana Drink':
                return new ManaDrink($name, $quality, $sellIn);
            default:
                return null;
        }
    }
}