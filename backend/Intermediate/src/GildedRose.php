<?php

namespace Dyflexis\Applicants;

use Dyflexis\Applicants\Items\AgedBrie;
use Dyflexis\Applicants\Items\Bread;
use Dyflexis\Applicants\Items\Item;
use Dyflexis\Applicants\Items\ManaDrink;

class GildedRose
{
    public static function of($name, $quality, $sellIn) : ?Item
    {
        switch ($name) {
            case 'Bread':
                return new Bread($name, $quality, $sellIn);
            case 'Aged Brie':
                return new AgedBrie($name, $quality, $sellIn);
            case 'Mana Drink':
                return new ManaDrink($name, $quality, $sellIn);
            default:
                return null;
        }
    }
}