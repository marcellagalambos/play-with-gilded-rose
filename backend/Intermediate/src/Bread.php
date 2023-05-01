<?php

namespace Dyflexis\Applicants;

class Bread extends Item
{
    public function __construct($quality, $sellIn) {
        $this->name = 'Bread';
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
        $this->quality--;
    }
}