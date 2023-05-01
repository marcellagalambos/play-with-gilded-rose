<?php

namespace Dyflexis\Applicants\Items;

class Sulfuras extends Item
{

    public function tick() : void
    {
        $this->updateQuality();
    }
    protected function updateQuality() : void
    {
        $this->quality = 80;
    }
}