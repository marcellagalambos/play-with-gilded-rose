<?php

namespace Dyflexis\Applicants;

class AgedBrie extends Item
{
    public function __construct($quality, $sellIn) {
        $this->name = 'AgedBrie';
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public function tick()
    {
        if ($this->quality < 50) {
            $this->updateQuality();
        }

        $this->sellIn = $this->sellIn - 1;

        if ($this->sellIn < 0) {
            if ($this->quality < 50) {
                $this->updateQuality();
            }
        }
    }

    protected function updateQuality() : void
    {
        $this->quality++;
    }
}