<?php

namespace Dyflexis\Applicants;

class GildedRose
{
    public static function of($name, $quality, $sellIn) {
        switch ($name) {
            case 'Bread':
                return new Bread($name, $quality, $sellIn);
            case 'Aged Brie':
                return new AgedBrie($name, $quality, $sellIn);
            case 'Mana Drink':
                return new ManaDrink($name, $quality, $sellIn);
        }
    }
}