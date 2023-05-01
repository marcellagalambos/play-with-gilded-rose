<?php

namespace Dyflexis\Applicants;

class ManaDrink extends Item
{
    protected function updateQuality() : void
    {
        if ($this->quality > 0) {
            $this->quality = $this->quality - 2;
        }
    }
}