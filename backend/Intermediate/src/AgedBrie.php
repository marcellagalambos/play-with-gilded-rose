<?php

namespace Dyflexis\Applicants;

class AgedBrie extends Item
{
    protected function updateQuality() : void
    {
        if ($this->quality < 50) {
            $this->quality++;
        }
    }
}