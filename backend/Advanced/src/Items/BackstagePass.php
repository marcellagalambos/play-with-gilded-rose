<?php

namespace Dyflexis\Applicants\Items;

class BackstagePass extends Item
{
    public function tick() : void
    {
        $this->updateQuality();

        $this->sellIn--;

        if ($this->sellIn < 10) {
            $this->updateQuality();
        }

        if ($this->sellIn < 5) {
            $this->updateQuality();
        }

        if ($this->sellIn < 0) {
            $this->updateQuality();
        }
    }
    protected function updateQuality() : void
    {
        if ($this->sellIn < 0) {
            $this->quality = 0;
        } else if ($this->quality < 50) {
            $this->quality++;
        }
    }
}