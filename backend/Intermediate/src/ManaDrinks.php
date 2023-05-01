<?php

namespace Dyflexis\Applicants;

class ManaDrinks extends Item
{
    public function __construct($quality, $sellIn) {
        $this->name = 'Mana Drink';
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }
    public function tick()
    {
        if ($this->quality > 0) {
            $this->updateQuality();
        }

        $this->sellIn = $this->sellIn - 1;

        if ($this->sellIn < 0) {
            if ($this->quality > 0) {
                $this->updateQuality();
            }
        }
    }

    protected function updateQuality() : void
    {
        $this->quality = $this->quality - 2;
    }
}