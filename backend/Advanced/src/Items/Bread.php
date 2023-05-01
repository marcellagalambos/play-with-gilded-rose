<?php

namespace Dyflexis\Applicants\Items;

class Bread extends Item
{
    protected function updateQuality() : void
    {
        if ($this->quality > 0) {
            $this->quality--;
        }
    }
}