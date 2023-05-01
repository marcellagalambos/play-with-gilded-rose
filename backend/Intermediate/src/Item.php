<?php

namespace Dyflexis\Applicants;

abstract class Item
{
    public $name;

    public $quality;

    public $sellIn;

    public abstract function tick();
    protected abstract function updateQuality();
}