<?php


namespace App;
use App\Item;

class Sulfuras extends Item
{

    public function __construct($name, $sellIn = 0, $quality = 80)
    {
        $this->setName($name);
        $this->sellIn = $sellIn;
        $this->quality = $quality;
    }

    public function setQuality($quality)
    {
        return;
    }

    public function setSellIn($sellIn)
    {
        return;
    }
    
    public function updateQuality()
    {
        return;
    }
}
