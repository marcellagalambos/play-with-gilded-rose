<?php

namespace Dyflexis\Applicants;

abstract class Item
{
    public $name;

    public $quality;

    public $sellIn;

    public function __construct($name, $quality, $sellIn) {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public function tick()
    {
        $this->updateQuality();

        $this->sellIn--;

        if ($this->sellIn < 0) {
            $this->updateQuality();
        }
    }
    protected abstract function updateQuality();
}