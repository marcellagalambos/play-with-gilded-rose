<?php

namespace Dyflexis\Applicants\Items;

abstract class Item
{
    public string $name;

    public int $quality;

    public int $sellIn;

    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public function tick() : void
    {
        $this->updateQuality();

        $this->sellIn--;

        if ($this->sellIn < 0) {
            $this->updateQuality();
        }
    }
    protected abstract function updateQuality() : void;
}