<?php


namespace App;
use App\Item;

class Conjured extends Item
{
    public function updateQuality()
    {
        $currentSellIn = $this->getSellIn();
        $this->setSellIn($currentSellIn - 1);

        $currentQuality = $this->getQuality();
        if($this->getSellIn() > 0) $this->setQuality($currentQuality - 2);
        else $this->setQuality($currentQuality - 4);
    }
}
