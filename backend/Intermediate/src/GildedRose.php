<?php

namespace Dyflexis\Applicants;

class GildedRose
{
    public static function of($name, $quality, $sellIn) {
        if ($name == 'Bread') {
            return new Bread($quality, $sellIn);
        } else if ($name == 'Aged Brie') {
            return new AgedBrie($quality, $sellIn);
        } else if ($name == 'Mana Drink') {
            return new ManaDrink($quality, $sellIn);
        }
    }
}